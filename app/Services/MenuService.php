<?php

namespace App\Services;

use App\Services\Interfaces\MenuServiceInterface;
use App\Classes\Nestedsetbie;
use App\Repositories\Interfaces\MenuRepositoryInterface as MenuRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService implements MenuServiceInterface
{
    protected $menuRepository;
    
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }
    
    public function paginate($request)
{
    $condition = [
        'publish' => $request->input('publish') !== null ? $request->integer('publish') : null,
    ];

    $relation = []; // Nếu có quan hệ với bảng khác, thêm vào đây
    $perPage = $request->integer('perpage') ?: 10;

    $menus = $this->menuRepository->pagination(
        $this->paginateSelect(),
        $condition,
        $relation,
        ['id', 'DESC'],
        $perPage
    );
    return $menus;
}

    public function paginateSelect()
    {
        return ['*'];
    }

    
    public function save($request)
    {
        DB::beginTransaction();
        try {
           
            $payload = $request->input('menu');
          
            if (isset($payload['name']) && count($payload['name'])) {
                foreach ($payload['name'] as $key => $name) {
                    // Lấy id menu, nếu bằng "0" tức là menu mới cần tạo
                    $menuId = isset($payload['id'][$key]) ? $payload['id'][$key] : "0";
                    
                    // Chuẩn bị dữ liệu cho menu
                    $data = [
                        'name'      => $name,
                        'slug'      => (isset($payload['slug'][$key]) && $payload['slug'][$key])
                                        ? $payload['slug'][$key]
                                        : Str::slug($name),
                        'parent_id' => (isset($payload['parent_id'][$key]) && $payload['parent_id'][$key] != "0")
                                        ? $payload['parent_id'][$key]
                                        : null,
                        'order'     => $payload['order'][$key] ?? null,
                        'user_id'   => Auth::id(),
                        'type'      => $payload['type'][$key] ?? null,
                        'publish'   => $payload['publish'][$key] ?? 1,
                    ];
                    
                    if ($menuId === "0" || $menuId == 0) {
                        // Tạo mới menu
                        $menuSave = $this->menuRepository->create($data);
                    } 
                }
                
                // Cập nhật lại cấu trúc Nested Set cho bảng menus
                $nestedSet = new Nestedsetbie('menus');
                $nestedSet->get();
                $relations = $nestedSet->set();
                $nestedSet->recursive(0, $relations);
                $nestedSet->updateNestedSet();
            }
            
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Lỗi khi lưu menu: ' . $e->getMessage());
            dd($e->getMessage());
            return false;
        }
    }

    public function update(Request $request)
    {
        $menus = $request->input('menus', []); // Lấy danh sách menu từ request, mặc định là mảng rỗng
    
        DB::beginTransaction();
        try {
            // Lấy danh sách tất cả menu cha hiện tại trong database
            $existingMenus = $this->menuRepository->getParentMenus()->pluck('id')->toArray();
    
            // Danh sách các ID menu còn tồn tại sau khi cập nhật
            $updatedMenuIds = [];
    
            foreach ($menus as $menuData) {
                $menuId = $menuData['id'];
    
                $data = [
                    'name' => $menuData['name'],
                    'slug' => $menuData['slug'] ?? Str::slug($menuData['name']), // Nếu không có slug, tự tạo
                    'order' => (int) $menuData['order'],
                    'publish' => (int) $menuData['publish'],
                ];
    
                // Cập nhật menu theo ID
                $updated = $this->menuRepository->updateMenu($menuId, $data);
                if (!$updated) {
                    throw new \Exception("Không thể cập nhật menu có ID: $menuId");
                }
    
                // Thêm vào danh sách các menu được cập nhật
                $updatedMenuIds[] = $menuId;
            }
    
            // Tìm những menu đã có trong DB nhưng không còn trong danh sách cập nhật => XÓA (nếu không có menu con)
            $menusToDelete = array_diff($existingMenus, $updatedMenuIds);
            if (!empty($menusToDelete)) {
                // Kiểm tra menu có menu con không
                $menusWithChildren = $this->menuRepository->getMenusWithChildren($menusToDelete);
                if (!empty($menusWithChildren)) {
                    throw new \Exception("Không thể xóa menu có menu con.");
                }
    
                // Xóa menu nếu không có menu con
                $this->menuRepository->deleteMenus($menusToDelete);
            }
    
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Cập nhật menu thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e->getMessage()); // Gửi thông báo lỗi về session
            return false;
        }
    }
    


    public function saveChildren(Request $request)
{
    $request->merge([
        'menu' => array_map(function ($id, $name, $slug, $order, $type, $publish) {
            return compact('id', 'name', 'slug', 'order', 'type', 'publish');
        }, $request->input('menu.id', []), $request->input('menu.name', []), 
           $request->input('menu.slug', []), $request->input('menu.order', []), 
           $request->input('menu.type', []), $request->input('menu.publish', []))
    ]);

    $validated = $request->validate([
        'parent_id'   => 'required|exists:menus,id',
        'menu.*.id'   => 'nullable|integer',
        'menu.*.name' => 'required|string|max:255',
        'menu.*.slug' => 'nullable|string|max:255',
        'menu.*.order' => 'nullable|integer',
        'menu.*.type' => 'nullable|string|max:255',
        'menu.*.publish' => 'boolean',
    ]);

    DB::beginTransaction();
    try {
        $menuIds = collect($validated['menu'])->pluck('id')->filter()->toArray();

        // Lấy danh sách menu cần xóa
        $menusToDelete = Menu::where('parent_id', $validated['parent_id'])
            ->whereNotIn('id', $menuIds)
            ->get();

        foreach ($menusToDelete as $menu) {
            if (Menu::where('parent_id', $menu->id)->exists()) {
                throw new \Exception("Không thể xóa menu có menu con.");
            }
            $menu->delete();
        }

        // Xử lý thêm hoặc cập nhật menu con
        foreach ($validated['menu'] as $menuData) {
            $menuData['slug'] = empty($menuData['slug']) ? Str::slug($menuData['name']) : $menuData['slug'];

            if (Menu::where('slug', $menuData['slug'])->where('id', '!=', $menuData['id'])->exists()) {
                continue;
            }

            if ((int) $menuData['id'] === 0) {
                unset($menuData['id']);
                $menuData['parent_id'] = $validated['parent_id'];
                $menuData['user_id'] = Auth::id();
                $this->menuRepository->create($menuData);
            } else {
                $this->menuRepository->updateMenu($menuData['id'], $menuData);
            }
        }

        $nestedSet = new Nestedsetbie('menus');
        $nestedSet->get();
        $relations = $nestedSet->set();
        $nestedSet->recursive(0, $relations);
        $nestedSet->updateNestedSet();

        DB::commit();
        return true;
    } catch (\Exception $e) {
        DB::rollBack();
        session()->flash('error', $e->getMessage()); // Gửi thông báo lỗi về session
        return false;
    }
}

    
    
    

    public function dragUpdate(array $json = [], $parentId = 0)
    {
        if (!empty($json)) {
            foreach ($json as $key => $val) {
                // order: nếu bạn muốn item đầu tiên trong mảng là order lớn nhất
                // thì có thể lấy count($json) - $key, ngược lại bạn tùy chỉnh logic.
                $update = [
                    'order'     => count($json) - $key,
                    // Nếu $parentId == 0 thì set null để lưu menu ở cấp root
                    'parent_id' => $parentId == 0 ? null : $parentId,
                ];
                // Gọi repository update để cập nhật menu
                $this->menuRepository->updateById($val['id'], $update);
    
                // Nếu có children, đệ quy để cập nhật các menu con
                if (isset($val['children']) && count($val['children'])) {
                    $this->dragUpdate($val['children'], $val['id']);
                }
            }
        }
    
        // Cập nhật lại cấu trúc Nested Set sau khi thay đổi parent_id và order
        $nestedSet = new \App\Classes\Nestedsetbie('menus');
        $nestedSet->get();
        $relations = $nestedSet->set();
        // Nút gốc ảo = 0 => root = parent_id = null
        $nestedSet->recursive(0, $relations);
        $nestedSet->updateNestedSet();
    }
    

}
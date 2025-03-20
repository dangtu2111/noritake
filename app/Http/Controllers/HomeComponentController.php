<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeComponent;
use App\Repositories\ProductCatalogueRepository;

class HomeComponentController extends Controller
{
    protected $productCatalogueRepository;
    protected $attributeCatalogueRepository;
    public function __construct(
        
        ProductCatalogueRepository $productCatalogueRepository,

    ) {
        
        $this->productCatalogueRepository = $productCatalogueRepository;
    }
    public function index()
    {   
        $components = HomeComponent::orderBy('order')->get();
        $template = 'backend.home_manager.index';
        return view('backend.dashboard.layout', compact(
            'template',
            'components'
        ));
    }

    public function create()
    {   
        
        $categories = $this->productCatalogueRepository->all();
        $template = 'backend.home_manager.create';
        $type="Create";
        return view('backend.dashboard.layout', compact(
            'template',
            'categories',"type"
        ));
    }
    public function update_index($id)
    {   
        $component = HomeComponent::find($id) ;

        $categories = $this->productCatalogueRepository->all();
        $type="Update";

        $template = 'backend.home_manager.create';
        return view('backend.dashboard.layout', compact(
            'template',"categories",'component'   ,"type"
        ));
    }
    
    public function delete($id)
    {
        $homeComponent = HomeComponent::find($id); // Sửa tên biến
        if (!$homeComponent) {
            return redirect()->route('home-components.index')->with('error', 'Không tìm thấy thành phần.');
        }
        $template = 'backend.home_manager.delete';
        return view('backend.dashboard.layout', compact(
            'template',
            'homeComponent'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'props.title' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('type') !== 'banner' && empty($value)) {
                        $fail('Trường tiêu đề là bắt buộc khi type không phải là banner.');
                    }
                },
            ],
            'props.id_category' => [
                'nullable',
                'exists:product_catalogues,id',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('type') !== 'banner' && empty($value)) {
                        $fail('Trường danh mục là bắt buộc khi type không phải là banner.');
                    }
                },
            ],
            'order' => 'nullable|integer', // Thay 'required' bằng 'nullable'
            'active' => 'required|boolean',
            'image' => 'nullable|string',
        ]);
        
        // Xử lý giá trị order sau khi validate
        $order = $request->input('order');
        if (is_null($order)) {
            // Lấy giá trị order lớn nhất từ database và cộng thêm 1
            $maxOrder = HomeComponent::max('order') ?? 0; // Giả sử model là HomeComponent
            $data['order'] = $maxOrder + 1;
        } else {
            $data['order'] = $order;
        }
 
        HomeComponent::create($data);
        
        return redirect()->route('home-components.index')->with('success', 'Thêm thành phần thành công');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'props.title' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('type') !== 'banner' && empty($value)) {
                        $fail('Trường tiêu đề là bắt buộc khi type không phải là banner.');
                    }
                },
            ],
            'props.id_category' => [
                'nullable',
                'exists:product_catalogues,id',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('type') !== 'banner' && empty($value)) {
                        $fail('Trường danh mục là bắt buộc khi type không phải là banner.');
                    }
                },
            ],

            'order' => 'nullable|integer', // Thay 'required' bằng 'nullable'
            'active' => 'required|boolean',
        ]);
        
        // Xử lý giá trị order sau khi validate
        $order = $request->input('order');
        if (is_null($order)) {
            // Lấy giá trị order lớn nhất từ database và cộng thêm 1
            $maxOrder = HomeComponent::max('order') ?? 0; // Giả sử model là HomeComponent
            $validated['order'] = $maxOrder + 1;
        } else {
            $validated['order'] = $order;
        }
        
        // Tiếp tục xử lý lưu dữ liệu
        // Ví dụ: HomeComponent::create($validated);
        
        $component = HomeComponent::findOrFail($id);
        $component->fill($validated);
        $component->props = $request->input('props');
        $component->save();
        return redirect()->route('home-components.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(HomeComponent $homeComponent)
    {
        $homeComponent->delete();
        return redirect()->route('home-components.index')->with('success', 'Xóa thành công');
    }
}
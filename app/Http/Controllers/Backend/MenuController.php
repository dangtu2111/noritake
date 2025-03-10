<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Services\Interfaces\MenuServiceInterface as MenuService;
use App\Repositories\Interfaces\MenuRepositoryInterface as MenuRepository;
use App\Repositories\ProductCatalogueRepository;



class MenuController extends Controller
{
  protected $menuService;
  protected $menuRepository;
  protected $productCatalogueRepository;
  public function __construct(
   MenuService $menuService,
   MenuRepository $menuRepository,
   ProductCatalogueRepository $productCatalogueRepository,

  ) {
    $this->menuService = $menuService;
    $this->menuRepository = $menuRepository;
    $this->productCatalogueRepository = $productCatalogueRepository;
  }

  public function index(Request $request)
  {
    //controller->service->repository thực hiện nghiệp vụ
    $menus = $this->menuService->paginate($request);
    // Định nghĩa đường dẫn tới template
    $template = 'backend.menu.index';
    // Trả về view với layout 'backend.dashboard.layout' và truyền biến 'template' và 'menus' tới view
    return view('backend.dashboard.layout', compact('template', 'menus'));
  }

  //khi ấn vào dòng thêm người dùng
  public function create()
  { 
    $parentMenus = \App\Models\Menu::whereNull('parent_id')->get();
    $template = 'backend.menu.create';
   

    return view('backend.dashboard.layout', compact('template','parentMenus'));
  }

  //Khi nhấn vào submit create
  public  function store(Request $request ){ //StoremenuRequest validate các menu cần create
    if($this->menuService->save($request)){
      flash()->success('Thêm mới thành công');
            return redirect()->route('system.index');
    }
    flash()->error('Thất bại. Đã có lỗi xảy ra vui lòng thử lại!');
  }

  //edit
  public function edit(){
    $parentMenus = $this->menuRepository->getParentMenus();

    $template = 'backend.menu.edit';
    return view('backend.dashboard.layout', compact('template','parentMenus'));
  }


  public function update(Request $request)
  {
      if ($this->menuService->update($request)) {
          flash()->success('Cập nhật thành công');
          return redirect()->route('menu.edit');
      }
  
      // Đảm bảo chỉ gọi thông báo lỗi 1 lần
      if (!session()->has('error')) {
          flash()->error('Thất bại. Đã có lỗi xảy ra, vui lòng thử lại!');
      }
  
      return redirect()->back();
  }
  


  public function children($id){
    $parentMenu = $this->menuRepository->find($id);

    // Lấy danh sách menu con
    $subMenus = $this->menuRepository->getSubMenusByParentId($id);

    $template = 'backend.menu.children';
    return view('backend.dashboard.layout', compact('template','parentMenu','subMenus'));
  }

  public function saveChildren(Request $request)
  {
      
      if ($this->menuService->saveChildren($request)) {
              flash()->success('Cập nhật menu con thành công!');
              return redirect()->route('menu.children', $request->parent_id);
      }
      if (!session()->has('error')) {
        flash()->error('Thất bại. Đã có lỗi xảy ra, vui lòng thử lại!');
    }

    return redirect()->back();
      
  }
  


  public function delete($id){
    $this->authorize('modules','menu.delete');
    $menuCatalouge=$this->menuCatalougeRepository->findById($id);
    $template = 'backend.menu.menu.delete';
    $seo = [
       'meta_title' => __('messages.menu') 
    ];
    return view('backend.dashboard.layout', compact('template', 'seo','menuCatalouge'));
  }

  public function destroy($id){
    if($this->menuService->destroy($id)){
    return redirect()->route('menu.index')->with('success', 'Xóa menu thành công');
    }
    return redirect()->route('menu.index')->with('error', 'Xóa menu ko thành công');
  }


}
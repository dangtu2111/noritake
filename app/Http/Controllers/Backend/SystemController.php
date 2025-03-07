<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Repositories\Interfaces\SystemRepositoryInterface as SystemRepository;
use  App\Services\Interfaces\SystemServiceInterface as SystemService;
use App\Classes\System; 
class SystemController extends Controller
{
    protected $systemLibrary;
    protected $systemRepository;
    protected $systemService;
    public function __construct(
        System $systemLibrary,SystemRepository $systemRepository,SystemService $systemService
    ) {
        $this->systemLibrary=$systemLibrary;
        $this->systemRepository=$systemRepository;
        $this->systemService=$systemService;
    }

    public function index(Request $request)
    {
        $systemConfig=$this->systemLibrary->config();
        $systems=convert_array($this->systemRepository->all(),'keyword','content');
        $template = 'backend.system.index';
        return view('backend.dashboard.layout', compact(
            'template','systemConfig','systems'
        ));
    }
   
    public function store(Request $request)
    {
        // gọi tới service với phương thức create 
      
        $result = $this->systemService->save($request);
        if ($result) {
            flash()->success('Thêm mới thành công');
            return redirect()->route('system.index');
        } else {
            flash()->error('Thất bại. Đã có lỗi xảy ra vui lòng thử lại!');
            // return redirect()->back();
        }
    }
   
}
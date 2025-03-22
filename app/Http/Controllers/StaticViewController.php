<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\ProductService;
class StaticViewController extends Controller
{   
    protected $productService;
    public function __construct(ProductService $productService){
        $this->productService=$productService;
    }
    public function index(Request $request)
    {
        $query = StaticPage::query();

        // Tìm kiếm theo keyword (title hoặc slug)
        if ($keyword = $request->input('keyword')) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('slug', 'like', "%{$keyword}%");
            });
        }

        // Lọc theo trạng thái publish
        if ($publish = $request->input('publish')) {
            $query->where('is_active', $publish);
        }

        // Số bản ghi trên mỗi trang
        $perPage = $request->input('perpage', 18);

        // Lấy dữ liệu với phân trang
        $pages = $query->paginate($perPage);
        $template = 'backend.static_pages.index';
        return view('backend.dashboard.layout', compact('pages','template'));
    }

    /**
     * Hiển thị form tạo trang tĩnh mới
     */
    public function create()
    {   
        $type="Create";
        $template = 'backend.static_pages.create';
        return view('backend.dashboard.layout',compact('template',"type"));
    }

    /**
     * Lưu trang tĩnh mới vào cơ sở dữ liệu
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:static_pages',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_active' => 'boolean',
            'active_pr' => ['nullable', 'boolean'],
        ]);

        // Tự động tạo slug nếu không nhập
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Đảm bảo slug là duy nhất
        $originalSlug = $data['slug'];
        $count = 1;
        while (StaticPage::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $count++;
        }

        StaticPage::create($data);

        return redirect()->route('static-pages.index')->with('success', 'Trang tĩnh đã được tạo!');
    }

    /**
     * Hiển thị form chỉnh sửa trang tĩnh
     */
    public function edit(StaticPage $staticPage)
    {
        $type="Update";
        $template = 'backend.static_pages.create';
        return view('backend.dashboard.layout', compact('staticPage',"type",'template'));
    }

    /**
     * Cập nhật trang tĩnh
     */
    public function update(Request $request, StaticPage $staticPage)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:static_pages,slug,' . $staticPage->id,
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_active' => 'boolean',
            'active_pr' => ['nullable', 'boolean'],
        ]);

        // Tự động tạo slug nếu không nhập
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Đảm bảo slug là duy nhất (ngoại trừ chính nó)
        $originalSlug = $data['slug'];
        $count = 1;
        while (StaticPage::where('slug', $data['slug'])->where('id', '!=', $staticPage->id)->exists()) {
            $data['slug'] = $originalSlug . '-' . $count++;
        }

        $staticPage->update($data);

        return redirect()->route('static-pages.index')->with('success', 'Trang tĩnh đã được cập nhật!');
    }

    /**
     * Xóa một trang tĩnh
     */
    public function destroy(StaticPage $staticPage)
    {
        $staticPage->delete();
        return redirect()->route('static-pages.index')->with('success', 'Trang tĩnh đã được xóa!');
    }

    /**
     * Xóa hàng loạt trang tĩnh
     */
    public function bulkDestroy(Request $request)
    {
        $arrayId = explode(',', $request->input('array_id'));
        if (!empty($arrayId)) {
            StaticPage::whereIn('id', $arrayId)->delete();
            return redirect()->route('static-pages.index')->with('success', 'Đã xóa các trang tĩnh được chọn!');
        }

        return redirect()->route('static-pages.index')->with('error', 'Không có trang nào được chọn để xóa!');
    }

    /**
     * Hiển thị trang tĩnh công khai
     */
    public function show($slug)
    {
        $page = StaticPage::where('slug', $slug)->where('is_active', true)->firstOrFail();
    
        $products = []; // Khởi tạo mặc định
    
        if ($page->active_pr) {
            $products = $this->productService->productNews();
        }
    
        return view('frontend.page_other.staticpage', compact('page', 'products'));
    }
    
}
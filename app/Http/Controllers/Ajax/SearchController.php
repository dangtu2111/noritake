<?php

namespace App\Http\Controllers\Ajax;
use App\Models\HomeComponent;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $post;
    protected $productService;
    protected $productVariant;

    public function construct(
        ProductService $productService,

    ) {
        $this->productService = $productService;
    }
    public function suggestion(Request $request)
    {
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            return response()->json(['không có kết quả tìm kiếm!']);
        }

        $products = Product::where('name', 'LIKE', "%{$keyword}%")
            ->get(['id', 'name', 'image']);

        return response()->json($products);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q'); // tên input
    
        // Truy vấn tất cả sản phẩm để đếm tổng số sản phẩm tìm được
        $totalProducts = Product::where('name', 'LIKE', "%{$keyword}%")
                                ->where('publish', 1)
                                ->count();
    
        // Phân trang kết quả tìm kiếm
        $products = Product::where('name', 'LIKE', "%{$keyword}%")
                            ->where('publish', 1)
                            ->with('productCatalogues', 'productVariant', 'productVariant.attributes')
                            ->paginate(8);
    
        return view('frontend.page_other.search', compact('products', 'keyword', 'totalProducts'));
    }
    
    
    
    public function modalSearch(Request $request)
    {
        $keyword = $request->input('q');
        if (empty($keyword)) {
            return response()->json(['error' => 'Vui lòng nhập từ khóa tìm kiếm']);
        }
        
        $products = Product::where('name', 'LIKE', "%{$keyword}%")
            ->where('publish', 1)
            ->with('productCatalogues', 'productVariant', 'productVariant.attributes')
            ->limit(5)
            ->get();
            
        return response()->json([
            'success' => true,
            'products' => $products
        ]);
    }
}
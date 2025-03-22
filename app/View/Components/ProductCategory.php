<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Repositories\ProductCatalogueRepository;
use App\Repositories\ProductRepository;

class ProductCategory extends Component
{
    protected $productCatalogueRepository;
    protected $productRepository;
    public $products;
    public $title;
    public $link;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ProductCatalogueRepository $productCatalogueRepository,
        ProductRepository $productRepository,
        $id_category = null,
        $title = 'Danh mục sản phẩm'
    ) {
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->productRepository = $productRepository;
        $this->link="#";

        if ($id_category) {
            // Tìm danh mục theo ID với quan hệ childrenReference
            $category = $this->productCatalogueRepository->findById($id_category, ['childrenReference']);
            
            if ($category) {
                // Lấy danh sách sản phẩm liên quan đến danh mục
                $this->products = $this->productRepository->allWhere([
                    ['publish', '=', 1],
                    ['product_catalogue_id', '=', $category->id], // Giả sử có cột product_catalogue_id
                ]);
            } else {
                $this->products = collect(); // Trả về collection rỗng nếu không tìm thấy danh mục
            }
            $this->link= route('product.category',['id'=>$id_category]);
        } else {
            // Mặc định lấy tất cả sản phẩm publish nếu không có id_category
            $this->products = $this->productRepository->allWhere([
                ['publish', '=', 1],
            ]);
        }

        $this->title = $title;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-category');
    }
}
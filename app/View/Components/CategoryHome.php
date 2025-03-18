<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Repositories\ProductCatalogueRepository;

class CategoryHome extends Component
{
    protected $productCatalogueRepository;
    public $productCatalogues;
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct(ProductCatalogueRepository $productCatalogueRepository, $title = 'Danh mục sản phẩm')
    {
        $this->productCatalogueRepository = $productCatalogueRepository;
        
        // Lấy dữ liệu trực tiếp từ repository
        $this->productCatalogues = $this->productCatalogueRepository->allWhere([
            ['publish', 1]
        ]);
        
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-home');
    }
} 
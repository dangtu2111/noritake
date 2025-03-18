<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\HomeComponent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductCatalogueRepository;
class HomeContent extends Component
{
    public $productNew;
    public $components;
    protected $productRepository;
    protected $productCatalogueRepository;
    public function __construct()
    {
        
       
        // Danh sách mặc định nếu không truyền cấu hình
        $this->components = HomeComponent::where('active', true)
            ->orderBy('order')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-content');
    }
}

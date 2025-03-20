<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\BannerService;

class Banner extends Component
{
    protected $bannerService;
    public $banners; // Đặt thành public để truy cập trong view

    /**
     * Create a new component instance.
     */
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
        $this->banners = $this->bannerService->paginateFontend();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.banner');
    }
}
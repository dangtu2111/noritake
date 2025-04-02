<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Repositories\BannerRepository;


class Banner extends Component
{
    protected $bannerRepository;
    public $banners; // Đặt thành public để truy cập trong view

    /**
     * Create a new component instance.
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
        $this->banners = $this->bannerRepository->allWhere([
            ['date_start', '<', now()],  // Sử dụng now() thay vì now
            ['date_end', '>', now()],    // Sử dụng now() thay vì now
            ['location', url()->current()],
            ['publish', 1]
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.banner');
    }
}
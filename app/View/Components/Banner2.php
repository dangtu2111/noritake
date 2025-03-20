<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner2 extends Component
{
    /**
     * Create a new component instance.
     */
    public $img;
    public $link;
    public $title;

    public function __construct($img='/libaries/upload/images/img-notfound.png',$link="#", $title="Bộ sưu tập")
    {
        $this->img=$img;
        $this->link=$link;
        $this->title=$title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.banner2');
    }
}

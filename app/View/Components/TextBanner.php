<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextBanner extends Component
{
    /**
     * Create a new component instance.
     */
    public $img;
    public $link;
    public $name;
    public $title;
    public $description;

    public function __construct($name="The white", $title="Bộ sưu tập",$img='/libaries/upload/images/img-notfound.png',$link="#",$description=" ")
    {   
        $this->name=$name;
        $this->img=$img;
        $this->link=$link;
        $this->title=$title;
        $this->description=$description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-banner');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Repositories\PostRepository;

class PostHome extends Component
{
    /**
     * Create a new component instance.
     */
    protected $postRepository;
    public $posts;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository=$postRepository;
        $this->posts=$this->postRepository->getLimitOrder(
            ['users'],
            [
                ['publish', 1],
            ],
            [
                ['created_at', 'desc'],
            ],
            []

        );
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-home');
    }
}

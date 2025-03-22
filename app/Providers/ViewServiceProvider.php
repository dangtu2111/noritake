<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Repositories\Interfaces\SystemRepositoryInterface as SystemRepository;

class ViewServiceProvider extends ServiceProvider
{
    protected $systemRepository;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->systemRepository = $app->make(SystemRepository::class);
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $menus = Menu::whereNull('parent_id')->with('children')->get();
            $systems = convert_array($this->systemRepository->all(), 'keyword', 'content');

            $view->with(compact('menus', 'systems'));
        });
    }
}

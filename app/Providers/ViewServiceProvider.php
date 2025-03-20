<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $menus = Menu::whereNull('parent_id')->with('children')->get();
            $view->with('menus', $menus);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\Setting;


//Para utilizar Paginator, é necessário colocar o objeto + class
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        //Menu
        $frontMenu = [
            '/' => 'Home'
        ];

        $pages = Page::all();
        foreach($pages as $page){
            $frontMenu[$page['slug']] = $page['title'];
        }

        View::share('front_menu', $frontMenu);

        //Configurações
        $config = [];
        $settings = Setting::all();
        foreach($settings as $setting){
            $config[$setting['name']] = $setting['content'];
        }

        View::share('front_config', $config);

    }
}

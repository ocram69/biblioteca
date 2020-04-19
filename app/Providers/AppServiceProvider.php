<?php

namespace App\Providers;

use App\Models\Admin\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Using Closure based composers...
        View::composer('themes.adminLte.nav', function ($view) {
            /**
             * Traigo los menus deacuerdo al rol del usuario
             */
            $menus = Menu::getMenu(true);
            //ddd($menus);
            /**
             * Paso a la vista los menus
             */
            $view->with('menusPorRol', $menus);
        });
        View::share('theme', 'adminLte');
    }
}

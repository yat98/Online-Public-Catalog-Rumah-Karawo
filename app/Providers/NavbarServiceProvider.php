<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class NavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $segment = \Request::segment(1);
        $halaman = '';

        if(empty($segment)){
            $halaman = 'home';
        }else if($segment == 'product'){
            $halaman = 'product';
        }else if($segment == 'login'){
            $halaman = 'login';
        }

        view()->share('halaman',$halaman);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

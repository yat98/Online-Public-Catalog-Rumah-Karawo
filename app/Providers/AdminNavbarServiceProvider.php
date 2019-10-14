<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminNavbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $halamanAdmin = '';
        $firstSeqment = \Request::segment(1);
        $secondSeqment = \Request::segment(2);

        if($firstSeqment == 'admin'){
            if(empty($secondSeqment)){
                $halamanAdmin = 'dashboard';
            }else if($secondSeqment == 'kategori'){
                $halamanAdmin = 'kategori';
            }else if($secondSeqment == 'jenis-kain'){
                $halamanAdmin = 'jenis kain';
            }else if($secondSeqment == 'product'){
                $halamanAdmin = 'produk';
            }else if($secondSeqment == 'user'){
                $halamanAdmin = 'user';
            }else if($secondSeqment == 'password'){
                $halamanAdmin = 'password';
            }
        }

        view()->share('halamanAdmin',$halamanAdmin);
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

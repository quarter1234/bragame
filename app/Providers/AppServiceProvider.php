<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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

        // 是否 HTTPS 环境
        // IS_HTTPS=true
        // HTTPS 访问
        if(env('IS_HTTPS')){
            URL::forceScheme('https');
        }
    }
}

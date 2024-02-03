<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Repositories\SConfigRepository;

class SconfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(SConfigRepository::class, function(){
//            return new SConfigRepository();
//        });
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

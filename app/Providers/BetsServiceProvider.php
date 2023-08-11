<?php

namespace App\Providers;

use App\Repositories\DUserMatchBetsRepository;
use App\Repositories\SBetConfigRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\BetDrawService;

class BetsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bets',function(){
            return new BetDrawService(new DUserMatchBetsRepository(), new SBetConfigRepository());
        });
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

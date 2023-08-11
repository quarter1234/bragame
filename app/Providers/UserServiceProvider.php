<?php

namespace App\Providers;

use App\Repositories\DCommissionRepository;
use App\Repositories\DUserDrawRepository;
use App\Repositories\UserRepository;
use App\Repositories\DUserRechargeRepository;
use App\Repositories\AgentAwardRepository;
use App\Repositories\BoxAwardRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('user',function(){
            return new UserService(new UserRepository(),
                                new DUserRechargeRepository(),
                                new DCommissionRepository(),
                                new DUserDrawRepository(),
                                new AgentAwardRepository(),
                                new BoxAwardRepository());
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

<?php

namespace App\Providers;

use App\Events\RegisterEvent;
use App\Events\UserGameEvent;
use App\Listeners\RegisterListener;
use App\Listeners\UserGameListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisterEvent::class => [
            RegisterListener::class
        ],
        UserGameEvent::class => [ // 点击游戏事件
            UserGameListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Events\UserGameEvent;
use App\Models\DUserLoginLog;
use App\Repositories\DPgGameUserLogRepository;
use App\Services\UserService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserGameListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    /**
     * 注册事件处理
     * @param  \App\Events\UserGameEvent  $event
     * @return mixed
     */
    public function handle(UserGameEvent $event)
    {
        $user = $event->user;
        $params = $event->params;

        // 保存登录日志
        $this->handleLogin($user, $params);

        // 保存游戏日志
        $userGameLogRepo = app()->make(DPgGameUserLogRepository::class);
        $userGameLogRepo->store($user, $params);
    }

    private function handleLogin($user, $params)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $haveLogin = DUserLoginLog::where('create_time', '>', $currentDate)->where('uid', $user['uid'])->first();
        if($haveLogin) {
            return false;
        }

        $userService = app()->make(UserService::class);
        $userService->storeLoginLog($user, $params);
    }
}
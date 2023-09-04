<?php

namespace App\Listeners;

use App\Cache\IndexGameCache;
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
        $this->handleGameClick($user, $params);
    }

    private function handleGameClick($user, $params)
    {
        $haveCache = IndexGameCache::getUserGameClickCache($user['uid'], $params['game_id'], $params['game_plat']);
        if($haveCache) {
            return false;
        }

        $userGameLogRepo = app()->make(DPgGameUserLogRepository::class);
        $userGameLogRepo->store($user, $params);

        IndexGameCache::setUserGameClickCache($user['uid'], $params['game_id'], $params['game_plat']);
    }

    private function handleLogin($user, $params)
    {
        // 先从缓存取
        $haveCache = IndexGameCache::getUserLoginCache($user);
        if($haveCache) {
            return false;
        }

        $currentDate = strtotime(date('Y-m-d'));
        $haveLogin = DUserLoginLog::where('create_time', '>', $currentDate)->where('uid', $user['uid'])->first();
        if($haveLogin) {
            return false;
        }

        $userService = app()->make(UserService::class);
        $userService->storeLoginLog($user, $params);
        IndexGameCache::setUserLoginCache($user);
    }
}
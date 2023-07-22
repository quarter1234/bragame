<?php

namespace App\Cache;

use Illuminate\Support\Facades\Cache;

class UserCache
{
    const TOKEN_KEY = "token_:%s";

    /**
     * 获取配置缓存
     * @param string $key
     * @return mixed
     */
    public static function getToken($user)
    {
        $cacheKey = sprintf(self::TOKEN_KEY, $user['token']);

        return Cache::remember($cacheKey, config('session.lifetime'), function () use($user){
            return $user['token'];
        });
    }
}
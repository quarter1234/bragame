<?php

namespace App\Cache;

use Illuminate\Support\Facades\Cache;

class UserCache
{
    const TOKEN_KEY = "token_:%s";
    const USER_PACKAGE_CACHE = 'user:package:uid_%s';

    /**
     * 获取配置缓存
     * @param string $key
     * @return mixed
     */
    public static function getToken($user)
    {
        $cacheKey = sprintf(self::TOKEN_KEY, $user['token']);

        return Cache::remember($cacheKey, config('session.lifetime'), function () use($user){
            return $user['uid'];
        });
    }

    public static function setUserPackageCache($user)
    {
        $cacheKey = sprintf(self::USER_PACKAGE_CACHE, $user['uid']);
        cache::put($cacheKey, true, 86400*30);
    }

    public static function getUserPackageCache($user)
    {
        $cacheKey = sprintf(self::USER_PACKAGE_CACHE, $user['uid']);
        cache::get($cacheKey);
    }
}

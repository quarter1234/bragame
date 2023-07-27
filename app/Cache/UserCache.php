<?php

namespace App\Cache;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;

class UserCache
{
    const TOKEN_KEY = "token_:%s";
    const USER_PACKAGE_CACHE = 'user:package:uid_%s';
    const USER_RANK_COIN_CACHE = 'index:user:rank_cache';

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
        return cache::put($cacheKey, true, 86400*30);
    }

    public static function getUserPackageCache($user)
    {
        $cacheKey = sprintf(self::USER_PACKAGE_CACHE, $user['uid']);
        return cache::get($cacheKey);
    }

    public static function getRankCoin()
    {
        $cacheKey = self::USER_RANK_COIN_CACHE;

        return Cache::remember($cacheKey, config('session.lifetime'), function () {
            $userRepo = app()->make(UserRepository::class);
            return $userRepo->getRankCoin();
        });
    }
}

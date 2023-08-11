<?php

namespace App\Cache;

use App\Common\Enum\CommonEnum;
use App\Repositories\DPgGameRepository;
use Illuminate\Support\Facades\Cache;

class IndexGameCache
{
    const PG_RECOMMEND_KEY = "index:game:pg:recommends";
    const PP_RECOMMEND_KEY = "index:game:pp:recommends";
    const FAVOR_RECOMMEND_KEY = "index:game:favor:recommendes";
    const USER_LOGIN_CACHE = 'user:login:uid_%s';
    const USER_GAME_CLICK_CACHE = 'user:game:click:game_s%:uid_%s';

    public static function getPGRecommend()
    {
        $cacheKey = sprintf(self::PG_RECOMMEND_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
                $pgRepo = app()->make(DPgGameRepository::class);
                return $pgRepo->getGameRecommend(['platform' => 'PGS'])->toArray();
        });
    }

    public static function getPPRecommend()
    {
        $cacheKey = sprintf(self::PP_RECOMMEND_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
                $pgRepo = app()->make(DPgGameRepository::class);
                return $pgRepo->getGameRecommend(['platform' => 'PP'])->toArray();
        });
    }

    public static function getFavorRecommend()
    {
        $cacheKey = sprintf(self::FAVOR_RECOMMEND_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
                $pgRepo = app()->make(DPgGameRepository::class);
                return $pgRepo->getGameFavor(['platform' => 'PGS'])->toArray();
        });
    }

    public static function setUserLoginCache($user)
    {
        $cacheKey = sprintf(self::USER_LOGIN_CACHE, $user['uid']);
        $ttl = (strtotime(date('Y-m-d'))+86400)-time();
        cache::put($cacheKey, true, $ttl);
    }

    public static function getUserLoginCache($user)
    {
        $cacheKey = sprintf(self::USER_LOGIN_CACHE, $user['uid']);
        return cache::get($cacheKey);
    }

    public static function setUserGameClickCache($userId, $gameId)
    {
        $cacheKey = sprintf(self::USER_GAME_CLICK_CACHE, $gameId, $userId);
        // $ttl = (strtotime(date('Y-m-d'))+86400)-time();
        cache::put($cacheKey, true, 120);
    }

    public static function getUserGameClickCache($userId, $gameId)
    {
        $cacheKey = sprintf(self::USER_GAME_CLICK_CACHE, $gameId, $userId);
        return cache::get($cacheKey);
    }
}
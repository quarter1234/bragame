<?php

namespace App\Cache;

use App\Common\Enum\CommonEnum;
use App\Repositories\ImageRepository;
use App\Repositories\SConfigRepository;
use App\Helper\UserHelper;
use Illuminate\Support\Facades\Cache;

class AllUseGameDrawCache
{
    const S_CACHE_KEY = "is_all_draw:%s";
    const S_ALL_DRAW = 1;
    const s_NOT_ALL_DRAW = 2;

    private static function _getCacheKey($uid){
        $cacheKey = sprintf(self::S_CACHE_KEY, $uid);
        return $cacheKey;
    }

    public static function rememberUseDraw($user, $beforecoin){
        $cacheKey = self::_getCacheKey($user['uid']);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () use($user, $beforecoin) {
            if($user){
                if($beforecoin == $user['gamedraw']){
                    return self::S_ALL_DRAW;
                }
            }
            return self::s_NOT_ALL_DRAW;
        });
    }

    public static function getIsAllUseDraw($uid){
        $cacheKey = self::_getCacheKey($uid);
        return Cache::get($cacheKey, self::s_NOT_ALL_DRAW);
    }

    public static function removeUserDraw($uid){
        $cacheKey = self::_getCacheKey($uid);
        Cache::forget($cacheKey);
    }
}

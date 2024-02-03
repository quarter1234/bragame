<?php

namespace App\Cache;

use App\Common\Enum\CommonEnum;
use App\Models\DPgGame;
use App\Repositories\DJlGameRepository;
use App\Repositories\DPgGameRepository;
use Illuminate\Support\Facades\Cache;
use App\Helper\SystemConfigHelper;

class IndexGameCache
{
    const PG_RECOMMEND_KEY = "index:game:pg:recommends";
    const PP_RECOMMEND_KEY = "index:game:pp:recommends";
    const TADA_RECOMMEND_KEY = "index:game:tada:recommends";
    const FAVOR_RECOMMEND_KEY = "index:game:favor:recommendes";
    const FAVOR_RECOMMEND_TADA_KEY = "index:game:tada:favor:recommendes";
    const USER_LOGIN_CACHE = 'user:login:uid_%s';
    const USER_GAME_CLICK_CACHE = 'user:game:click:game_s%:uid_%s:game_plat_%s';

    public static function getPGRecommend()
    {
        $cacheKey = sprintf(self::PG_RECOMMEND_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
                $pgRepo = app()->make(DPgGameRepository::class);
                return $pgRepo->getGameRecommend(['platform' => 'PGS'])->toArray();
        });
    }

    public static function getPGRecommendtc()//剔除假PG
    {
        $str = self::selectPgprogame();
        return DPgGame::where('platform', 'PGS')
        ->where('game_status', CommonEnum::ENABLE)
        ->whereNotIn('game_name', $str)
        ->orderBy('sort', 'desc')
        ->limit(9)
        ->get()->toArray();
    }

    public static function getPPRecommend()
    {
        $cacheKey = sprintf(self::PP_RECOMMEND_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
                $pgRepo = app()->make(DPgGameRepository::class);
                return $pgRepo->getGameRecommend(['platform' => 'PP'])->toArray();
        });
    }

    public static function getTadaRecommend()
    {
        $cacheKey = sprintf(self::TADA_RECOMMEND_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
                $pgRepo = app()->make(DPgGameRepository::class);
                return $pgRepo->getGameRecommend(['platform' => 'JL'])->toArray();
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

    public static function getFavorRecommendtc()//剔除假PG
    {
        $str = self::selectPgprogame();
        return DPgGame::where('game_status', CommonEnum::ENABLE)
        ->where('platform', 'PGS')
        ->whereNotIn('game_name', $str)
        ->orderBy('sort', 'desc')
        ->limit(6)
        ->get()->toArray();
    }

    /**
     * 假PG，新假PG
     */
    public static function selectPgprogame(){
        $pgstatus = SystemConfigHelper::getByKey('pgstatus');
        if($pgstatus == 1){ //假PG
            $str = CommonEnum::PGPRO;
        }elseif($pgstatus == 2){ //新假PG
            $str = CommonEnum::PGPROOH;
        }
        return $str;
    }

    public static function getFavorRecommendTada()
    {
        $cacheKey = sprintf(self::FAVOR_RECOMMEND_TADA_KEY);
        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
            $JLRepo = app()->make(DJlGameRepository::class);
            return $JLRepo->getGameFavor()->toArray();
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

    public static function setUserGameClickCache($userId, $gameId, $gamePlat)
    {
        $cacheKey = sprintf(self::USER_GAME_CLICK_CACHE, $gameId, $userId, $gamePlat);
        // $ttl = (strtotime(date('Y-m-d'))+86400)-time();
        cache::put($cacheKey, true, 120);
    }

    public static function getUserGameClickCache($userId, $gameId, $gamePlat)
    {
        $cacheKey = sprintf(self::USER_GAME_CLICK_CACHE, $gameId, $userId, $gamePlat);
        return cache::get($cacheKey);
    }
}
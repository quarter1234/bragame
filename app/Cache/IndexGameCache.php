<?php

namespace App\Cache;

use App\Common\Enum\CommonEnum;
use App\Repositories\DPgGameRepository;
use Illuminate\Support\Facades\Cache;

class IndexGameCache
{
    const PG_RECOMMEND_KEY = "index:game:pg:recommend";
    const PP_RECOMMEND_KEY = "index:game:pp:recommend";
    const FAVOR_RECOMMEND_KEY = "index:game:favor:recommendes";

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
}
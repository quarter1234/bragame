<?php

namespace App\Cache;

use App\Common\Enum\CommonEnum;
use App\Repositories\ImageRepository;
use App\Repositories\SConfigRepository;
use Illuminate\Support\Facades\Cache;

class SconfigCache
{
    const S_CONFIG_KEY = "s_config_keys:%s";

    /**
     * 获取配置缓存
     * @param string $key
     * @return mixed
     */
    public static function getByKey(string $key)
    {
        // $cacheKey = sprintf(self::S_CONFIG_KEY, $key);

//        return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () use($key) {
//            $configRepo = app()->make(SConfigRepository::class);
//            return $configRepo->getConfigByKey($key);
//        });

        $configRepo = app()->make(SConfigRepository::class);
        return $configRepo->getConfigByKey($key);

    }
}

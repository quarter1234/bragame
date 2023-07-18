<?php

namespace App\Cache;

use App\Common\Enum\CommonEnum;
use App\Repositories\SConfigVipUpgradeRepository;
use Illuminate\Support\Facades\Cache;

class SConfigVipCache
{
    const S_CONFIG_KEY = "s_config_vip_upgrades";

    /**
     * 获取配置缓存
     * @param string $key
     * @return mixed
     */
    public static function getVipList()
    {
        $cacheKey = sprintf(self::S_CONFIG_KEY);

       return Cache::remember($cacheKey, CommonEnum::CACHE_TIME, function () {
            $configRepo = app()->make(SConfigVipUpgradeRepository::class);
            return $configRepo->getConfigs()->toArray();
       });
    }
}
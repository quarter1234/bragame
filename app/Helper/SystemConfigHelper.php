<?php

namespace App\Helper;

use App\Cache\SconfigCache;
use function PHPUnit\Framework\isJson;

class SystemConfigHelper 
{   
    /**
     * 获取配置信息
     * @param string $key
     * @return mixed
     */
    public static function getByKey(string $key)
    {
        $configInfo = SconfigCache::getByKey($key);
        $config = $configInfo['v'] ?? '';

        if($config && isJson($config)) {
            return json_decode($config, true);
        } elseif($config) {
            return $config;
        }

        return false;
    }
}
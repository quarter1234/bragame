<?php

namespace App\Helper;

use App\Models\User;
use App\Services\GameService;

class GameHelper
{
    /**
     * 获取PG游戏地址
     * @param [type] $user
     * @param [type] $gameCode
     * @return mixed
     */
    public static function getPgGameUrl($user, $gameCode)
    {
        $gameService = app()->make(GameService::class);
        $res = $gameService->getPgGameUrl($gameCode, $user);

        if(isset($res['code']) && $res['code'] === 0) {
            return $res['data']['url'];
        }

        return false;
    }

    public static function getJiliGameUrl($user, $gameCode)
    {
        $gameService = app()->make(GameService::class);
        $res = $gameService->getJiliGameUrl($gameCode, $user);

        if(isset($res['code']) && $res['code'] === 0) {
            return $res['data']['url'];
        }

        return false;
    }

    public static function getPgProGameUrl($user, $gameCode)
    {
        $gameService = app()->make(GameService::class);
        $res = $gameService->getPgProGameUrl($gameCode, $user);

        if(isset($res['code']) && $res['code'] === 0) {
            $uri = $res['data']['url'];
            $remote = SystemConfigHelper::getByKey('plat_app_pgpro_s3');
            $remote = $remote . $gameCode . '/';
            if($remote){
                $url = $remote . '?' . $uri;
            }
            else{
                $url = "https://dkwin.vip/?" . $uri;
            }
            
            return $url;
        }

        return false;
    }

    public static function getPgProOhGameUrl($user, $gameCode){
        $gameService = app()->make(GameService::class);
        $res = $gameService->getPgProOhGameUrl($gameCode, $user);

        if(isset($res['code']) && $res['code'] === 0) {
            return $res['data']['url'];
        }

        return false;
    }
}

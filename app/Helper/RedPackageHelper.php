<?php

namespace App\Helper;

use App\Cache\UserCache;
use App\Common\Enum\CommonEnum;
use App\Repositories\DRedPacketRepository;
use App\Repositories\DRedPacketUserRepository;

class RedPackageHelper 
{
    public static function isShowRedPackage($user) :bool
    {
        if(!$user) {
            return false;
        }
        
        // 已经领取过的不显示
        if(UserCache::getUserPackageCache($user)) {
            return false;
        }
        
        $redPackRepo = app()->make(DRedPacketRepository::class);
        $userRedPackRepo = app()->make(DRedPacketUserRepository::class);

        $info = $redPackRepo->getCurrentInfo(time());
        // 未存在
        if(!$info) {
            return false;
        }

        // 已经领取过
        $haveLottery = $userRedPackRepo->getUserLottery($user, $info);
        if($haveLottery && $haveLottery['status'] == CommonEnum::ENABLE) {
            return false;
        }

        return true;
    }
}

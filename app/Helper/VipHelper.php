<?php

namespace App\Helper;

use App\Cache\SConfigVipCache;

class VipHelper
{
    /**
     * 添加vip经验 ，升级vip
     * @param integer $uid
     * @param int $diamond
     * @return void
     */
    public static function useVipDiamond(int $uid, $diamond)
    {
        $user = UserHelper::getUserByUid($uid);
        $user->svipexp = $user->svipexp + $diamond;
        $user->save();

        $oldVipLeve = $user->svip ?? 0;
        $currentVipLeve = self::getLevelByExp($user->svipexp);

        if($currentVipLeve > $oldVipLeve) {
            $user->svip = ($user->svip + 1);
            $user->save();
        }
    }

    public static function getLevelByExp(int $diamondUsed)
    {
        if($diamondUsed <= 0) {
            return 0;
        }

        $target = 0;

        $vipList = SConfigVipCache::getVipList();
        foreach ($vipList as $item) {
            if($diamondUsed <= $item['diamond']) {
                $target = ($item['id'] -1);
                break;
            }
        }

        return $target <= 0 ? 0 : $target;
    }
}

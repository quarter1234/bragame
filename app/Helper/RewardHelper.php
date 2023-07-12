<?php

namespace App\Helper;

use App\Common\Enum\CommonEnum;
use App\Common\Enum\GameEnum;
use App\Repositories\SSendCoinRepository;

class RewardHelper 
{
    public static function addSuperiorRewards($uid, $actType, $coin = 0, $rtype = 1, $gameId = 0, $issue = '', $type = 1)
    {
        
        $playInfo = UserHelper::getUserByUid($uid);
        if(!$playInfo) {
            return false;
        }
        
        $isPlayer = $playInfo['ispayer'] ?? 0;
        $invitUid = $playInfo['invit_uid'] ?? 0;
        $parentInfo = UserHelper::getUserByUid($playInfo->invit_uid);
        
        $flag = self::getFlag($actType, $rtype, $invitUid, $isPlayer);
        if(!$flag) {
            return false;
        }
        
        $config = SystemConfigHelper::getByKey('invite');
        if(!$config) {
            return false;
        }
        
        $title= 'userreg';
        $coin1 = 0;
        $rate1 = '';
        $coin2 = 0;
        $rate2 = '';
        
        if($actType == GameEnum::REG) {
            if(isset($config['invite']) && isset($config['invite']['coin1']) && $config['invite']['coin1'] > 0) {
                $coin1 = $config['invite']['coin1'];
                $rate1 = $config['invite']['rate1'];
            }

            if(isset($config['invite']) && isset($config['invite']['coin2']) && $config['invite']['coin2'] > 0) {
                $coin2 = $config['invite']['coin2'];
                $rate2 = $config['invite']['rate2'];
            }
        } elseif($actType == GameEnum::BUY) {
            $title = 'userrecharge';
            $coin1 = round($coin * $config['recharge']['rrate1'], 2);
            $coin2 = round($coin * $config['recharge']['rrate2'], 2);
            $rate1 = $config['recharge']['rate1'];
            $rate2 = $config['recharge']['rate2'];
        } elseif($actType == GameEnum::BET) {
            $title = 'userbet';
            $coin1 = round($coin * $config['bet']['rrate1']);
            $coin2 = round($coin * $config['bet']['rrate2']);
            $rate1 = $config['bet']['rate1'];
            $rate2 = $config['bet']['rate2'];
        }
        
        $added1 = false;
        if($coin1 >0) { // 上级奖励
            if($parentInfo->stopregrebat == 0) {
                $added1 = true;
                self::addCoinByRate($parentInfo, $playInfo->invit_uid, $coin1, $rate1, $actType, $title, $uid);
            }
        }
    }

    public static function addCoinByRate($parentInfo, $parentid, $addCoin, $rate, $actType, $title, $suid = 0)
    {
        $rateArr = self::decodeRate($rate);
       
        if(intval($rateArr[0]) > 0) {
            $svip = $parentInfo['svip'] ?? 0;
            $coin = round($rateArr[0] * $addCoin);

            $parentInfo->coin = $coin;
            $parentInfo->save();

            $sendRepo = app()->make(SSendCoinRepository::class);
            $sendRepo->store($parentInfo, $coin,$actType, $svip);
        }elseif(intval($rateArr[1]) > 0) {

        }
    }

    public static function addCoin()
    {

    }
    
    public static function decodeRate($str) {
        $rateArr = [1, 0, 0];
        if(!$str) {
            return $rateArr;
        }
        return explode(':', $str);
    }

    private static function getFlag($actType, $rtype, $invitUid, $isPlayer) :bool
    {
        $flag = false;
        if($actType == GameEnum::REG) {
            if($rtype == CommonEnum::ENABLE) {
                if($invitUid > 0 && $isPlayer == 1) { // 充值用户
                    $flag = true;
                }
            } else {
                if($invitUid > 0) {
                    $flag = true;
                }
            }
        } else {
            if($invitUid > 0 && $isPlayer == 1) {
                $flag = true;
            }
        }
        return $flag;
    }
    
}
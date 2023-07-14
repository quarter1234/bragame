<?php

namespace App\Helper;

use App\Common\Enum\CommonEnum;
use App\Common\Enum\GameEnum;
use App\Repositories\SSendCoinRepository;
use App\Facades\User;

class RewardHelper
{
    public static function addSuperiorRewards($uid, $actType, $coin = 0, $rtype = 1, $gameId = 0, $type = 1)
    {
        $rtype = $rtype ?? 1; // 注册返利的开关点, 1:充值时候返， 2:立即绑定就返
        $playInfo = UserHelper::getUserByUid($uid);
        if(!$playInfo) {
            return false;
        }

        $isPlayer = $playInfo['ispayer'] ?? 0;
        $invitUid = $playInfo['invit_uid'] ?? 0;
        $flag = false;
        if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['REG']){
            if($rtype == 1){
                if($invitUid > 0 && $isPlayer == 1){
                    $flag = true;
                }
            }
            else{
                if($invitUid > 0){
                    $flag = true;
                }

            }
        }
        else{
            if($invitUid > 0 && $isPlayer == 1){
                $flag = true;
            }
        }
        if($flag){
            $parentuid = $playInfo['invit_uid'];
            $config = SystemConfigHelper::getByKey('invite');
            if(!$config) {
                return false;
            }

            $title= 'userreg';
            $coin1 = 0;
            $rate1 = '';
            $coin2 = 0;
            $rate2 = '';
            if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['REG']) {
                if(isset($config['invite']) && isset($config['invite']['coin1']) && $config['invite']['coin1'] > 0) {
                    $coin1 = $config['invite']['coin1'];
                    $rate1 = $config['invite']['rate1'];
                }
                if(isset($config['invite']) && isset($config['invite']['coin2']) && $config['invite']['coin2'] > 0) {
                    $coin2 = $config['invite']['coin2'];
                    $rate2 = $config['invite']['rate2'];
                }
            } elseif($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['BUY']) {
                $title = 'userrecharge';
                $coin1 = roundCoin($coin * $config['recharge']['rrate1']);
                $coin2 = roundCoin($coin * $config['recharge']['rrate2']);
                $rate1 = $config['recharge']['rate1'];
                $rate2 = $config['recharge']['rate2'];
            } elseif($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['BET']) {
                $title = 'userbet';
                $coin1 = roundCoin($coin * $config['bet']['rrate1']);
                $coin2 = roundCoin($coin * $config['bet']['rrate2']);
                $rate1 = $config['bet']['rate1'];
                $rate2 = $config['bet']['rate2'];
            }
            // coin2 = 0
            $added1 = false;
            if($coin1 >0) { // 上级奖励
                $parentInfo = UserHelper::getUserByUid($playInfo->invit_uid);
                if($parentInfo && $parentInfo['stopregrebat'] == 0) { // 是否停止奖励
                    $added1 = true;
                    self::addCoinByRate($playInfo->invit_uid, $coin1, $rate1, $actType);
                }
            }
        }

        $parentInfo = UserHelper::getUserByUid($playInfo->invit_uid);

        $flag = self::getFlag($actType, $rtype, $invitUid, $isPlayer);
        if(!$flag) {
            return false;
        }



        $title= 'userreg';
        $coin1 = 0;
        $rate1 = '';
        $coin2 = 0;
        $rate2 = '';




    }

    public static function addCoinByRate($parentid, $addCoin, $rate, $actType)
    {
        $parentInfo = UserHelper::getUserByUid($parentid); // TODO 可以使用缓存
        $rateArr = self::decodeRate($rate);
        $nowtime = time();
        $sendArr = [0, 0, 0];
        $sendArr[0] = roundCoin($rateArr[0] * $addCoin);
        $sendArr[1] = roundCoin($rateArr[1] * $addCoin);
        $sendArr[2] = roundCoin($rateArr[2] * $addCoin);
        $rewardsType = 0; // 奖励类型
        $title = '';
        if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['REG']){ // --下级注册
            $title = 'reg';
            $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['AGENT_REG_REWARDS']; // --下级注册奖励
        }
        else if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['BUY']){ // --下级充值
            $title = 'buy';
            $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['AGENT_BUY_REWARDS']; // --下级购买奖励
        }
        else if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['BET']){ // --下级下注
            $title = 'bet';
            $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['AGENT_BET_REWARDS']; // --下级bet奖励
        }
        else if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['Mail']){ // --邮件奖励
            $title = 'mail';
            $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['MAIL_REWARDS']; // --邮件
        }
        else if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['VIP']){ // -- vip升级
            $title = 'vipbonus';
            $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['VIP_BONUS']; // --VIP奖励
        }
        else{
            $title = 'other';
            $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['OTHER_REWARDS'];
        }
        if($sendArr[0] > 0) {
            $svip = $parentInfo['svip'] ?? 0;
            $coin = $sendArr[0];
            list($beforecoin, $aftercoin) = User::alterUserCoin($parentInfo, $coin, $rewardsType);
            $alterlog = $title . $coin;
            LogHelper::insertCoinLog($parentid,
                                    $beforecoin,
                                    $coin,
                                    $aftercoin,
                                    $alterlog,
                                    GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['QUEST'],
                                    $rewardsType);

            LogHelper::addSendLog($parentid, $coin, $actType, 0, 1, 0, $svip);
            if($rewardsType == GameEnum::PDEFINE['ALTERCOINTAG']['MAIL_REWARDS']){
                // TODO 添加打码match  addUserBetMatch
            }

        }
        else if($sendArr[1] > 0) {
            $coin = $sendArr[1];
            // 添加提现钱包和背包金额
            list($beforecoin, $aftercoin) = User::alterUserCoin($parentInfo, $coin, $rewardsType);
            User::updateGameDrawInDraw($parentInfo, $coin);
            LogHelper::addSenddrawLog($parentid, $title, $coin, $actType);
        }
    }

    /**
     * 游戏中下注返佣
     * @param $uid
     * @param $actType
     * @param $coin
     * @param $gameId
     * @param $type
     */
    public function gameRebate($uid, $actType, $coin, $gameId, $type){
        $inviteConfig = SystemConfigHelper::getByKey('invite');
        $rebateGamelist = [];
        $str = "";
        if($inviteConfig && $inviteConfig['bet']){
            if($type == 1){
                if($inviteConfig['bet']['gameids']){
                    $str = $inviteConfig['bet']['gameids'] ?? '';
                }
            }
            else if($type == 2){
                if($inviteConfig['bet']['jlgameids']){
                    $str = $inviteConfig['bet']['jlgameids'] ?? '';
                }
            }
            else if($type == 3){
                if($inviteConfig['bet']['pggameids']){
                    $str = $inviteConfig['bet']['pggameids'] ?? '';
                }
            }

            if(!empty($str)){
                $rebateGamelist = explode(",", $str);
            }
        }

        foreach($rebateGamelist as $gid){
            if($gid == $gameId){
                self::addSuperiorRewards($uid, $actType, $coin, 2, $gameId, $type);
                break;
            }
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
        if($actType == GameEnum::PDEFINE['TYPE']['SOURCE']['REG']) {
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

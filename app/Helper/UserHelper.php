<?php

namespace App\Helper;

use App\Cache\SConfigVipCache;
use App\Models\User;
use App\Repositories\DBankRepository;
use App\Repositories\DUserInviteRepository;
use Illuminate\Support\Facades\Log;

class UserHelper
{
    public static function avatar($usericon)
    {
        return 'https://www.betbra.net:8032/bx_1/public/static/head/head_'.$usericon.'.png';
    }

    /**
     * 生成用户邀请码
     * @return string
     */
    public static function inviteCode(int $length = 4) :string
    {
        $code = '';

        while (true) {
            $code = strtoupper(generalRandString($length));
            $userInfo =self::getUserByCode($code);

            if(!$userInfo) {
                break;
            }
        }

        return $code;
    }

    /**
     * 生成token
     * @param integer $length
     * @return string
     */
    public static function token(int $length = 8) :string
    {
        $token = '';

        while (true) {
            $token = strtoupper(generalRandString($length));
            $userInfo =self::getUserByToken($token);

            if(!$userInfo) {
                break;
            }
        }

        return $token;
    }

    public static function getUserByPgPro(string $userIdStr){
        $userMsg = explode('x', $userIdStr);
        if(!empty($userMsg) && isset($userMsg[1])){
            $userId = $userMsg[1];
            return self::getUserByUid($userId);
        }

        return null;
    }

    /**
     * 根据邀请码获取用户信息
     * @param string $code
     * @return mixed
     */
    public static function getUserByCode(string $code)
    {
        if(!$code) {
            return false;
        }

        return User::where('code', $code)->first();
    }

    /**
     * 根据token获取用户信息
     * @param string $token
     * @return mixed
     */
    public static function getUserByToken(string $token)
    {
        if(!$token) {
            return false;
        }

        return User::where('token', $token)->first();
    }


    public static function getUserByUid(int $uid)
    {
        return User::where('uid', $uid)->first();
    }

    public static function getVipInfo($userInfo) :array
    {
        $svip = $userInfo['svip'] ?? 0;

        return self::getNextVipInfoExp($svip);
    }

    public static function getNextVipInfoExp($svip) :array
    {
        $svip = intval($svip);

        $vipList = SConfigVipCache::getVipList();

        if(isset($vipList[$svip + 1]) && $vipList[$svip + 1]) {
            $exp = $vipList[$svip + 1]['diamond'];
        }

        if($svip == 20) {
            $exp = $vipList[$svip]['diamond'];
        }

        return ['exp' => $exp, 'vipList' => $vipList];
    }

    /**
     * 获取用户余额
     * @param mixed $user
     * @return array
     */
    public static function getUserCoin($user) :array
    {
        $dcoin = floatval($user['gamedraw']);
        $totalcoin = $user['coin'];

        if($dcoin < 0) {
            $dcoin = 0;
        }

        if($dcoin > $user['coin']) {
            $dcoin = $user['coin'];
        }
        $bankRepo = app()->make(DBankRepository::class);
        $bankInfo = $bankRepo->getBankInfo($user->uid);
        if($bankInfo) {
            $totalcoin = $totalcoin + intval($bankInfo['coin']);
        }

        return [
            'uid' => $user['uid'],
            'coin'=> floatval($user['coin']), //现金余额
            'dcoin'=> $dcoin, //可提金额
            'ecoin' => $user['coin'] - $dcoin, //cash balance
            'totalcoin' => $totalcoin,
            'svip' => intval($user['svip']),
            'ispayer' => intval($user['ispayer']),
        ];
    }

    public static function getIsInviteFilter($uid){
        $startTime = strtotime(date('Y-m-d'));
        $endTime = $startTime + 86400;
        $userInviteRepo = app()->make(DUserInviteRepository::class);
        $list = $userInviteRepo->getPayUserCount($uid, $startTime, $endTime);
        $oneFirstRecharge = $list->count();
        $config = SystemConfigHelper::getByKey('box_award');
        if($config
            && isset($config['box']['is_rate'])
            && $config['box']['is_rate'] > 0
            && isset($config['box']['box_num_limit'])
            && $oneFirstRecharge > $config['box']['box_num_limit']) {
            return true; // 被过滤
        }

        return false;
    }

    public static function getTestIsInviteFilter($uid, $startTime, $endTime){
        $userInviteRepo = app()->make(DUserInviteRepository::class);
        $list = $userInviteRepo->getPayUserCount($uid, $startTime, $endTime);
        $oneFirstRecharge = $list->count();
        Log::debug("getTestIsInviteFilter-count:" . $oneFirstRecharge);
        $config = SystemConfigHelper::getByKey('box_award');
        if($config
            && isset($config['box']['is_rate'])
            && $config['box']['is_rate'] > 0
            && isset($config['box']['box_num_limit'])
            && $oneFirstRecharge > $config['box']['box_num_limit']) {
            return true; // 被过滤
        }

        return false;
    }
}

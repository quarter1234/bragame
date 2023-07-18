<?php

namespace App\Helper;

use App\Cache\SConfigVipCache;
use App\Models\User;

class UserHelper 
{
    public static function avatar($usericon)
    {
        return '/static/head/head_'.$usericon.'.png';
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
}
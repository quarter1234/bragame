<?php

namespace App\Helper;

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
}
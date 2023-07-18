<?php
namespace App\Services;

use App\Helper\UserHelper;

class MemberService
{
    public function __construct()
    {
        
    }

    public function getVipInfo($user) :array
    {
        $res = UserHelper::getVipInfo($user);

        foreach ($res['vipList'] as &$item) {
            $item['rewards_format'] = explode(':', $item['rewards'])[1];
            $item['weeklybonus_format'] = explode(':', $item['weeklybonus'])[1];
            $item['monthlybonus_foramt'] = explode(':', $item['monthlybonus'])[1];
        }

        $res['user'] = $user;

        return $res;
    }
}
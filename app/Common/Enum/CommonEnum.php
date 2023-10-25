<?php

declare(strict_types=1);

namespace App\Common\Enum;

class CommonEnum
{
    const ENABLE = 1;
    const UNABLE = 0;
    const DEFAULT_PAGE_NUM = 9;
    const DEFAULT_INVITE_NUM = 20;

    const NUM_FOUR = 4;
    const RECOMMEND_NUM = 9;

    const INVITE_CODE_KEY = 'invite_code';
    const CACHE_TIME = (60 * 5);
    const CACHE_SHORT_TIME = (60 * 5);

    const GAME_PLAT_SELF = 0;
    const GAME_PLAT_TADA = 1;
    const GAME_PLAT_PG = 2;
    const GAME_PLAT_PGPRO = 3;

    const USER_TEAM_BAN_NOR = 1; // 正常
    const USER_TEAM_BAN_BLOCK = 2; // 封禁

    const S3_PATH_ARR = [
        "mobile" => '/bx_1/public',
        "black" => '/bx_4/public',
        "pink" => '/bx_4/public',
        "red" => '/bx_4/public',
        "blue" => '/bx_4/public',
        "purple" => '/bx_4/public',
        "gold" => '/bx_4/public',
        "spain" => '/bx_4/public',
        "green2" => '/bx_4/public',
        "green" => '/bx_4/public',
        "deep" => '/bx_4/public',
        "lake" => '/bx_4/public',
        "brling" => '/bx_4/public',
    ];
}

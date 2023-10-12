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

    const S3_PATH_ARR = [
        "mobile" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public',
        "black" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "pink" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "red" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "blue" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "purple" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "gold" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "spain" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "green2" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
        "green" => 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_5/public',
    ];
}

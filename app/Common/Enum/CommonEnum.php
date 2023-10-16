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
        "mobile" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_1/public',
        "black" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "pink" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "red" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "blue" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "purple" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "gold" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "spain" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "green2" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "green" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "deep" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
        "lake" => 'https://bxgames3.s3.sa-east-1.amazonaws.com/bx_4/public',
    ];
}

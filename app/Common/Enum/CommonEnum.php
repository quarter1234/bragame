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
}

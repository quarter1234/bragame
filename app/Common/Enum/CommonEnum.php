<?php

declare(strict_types=1);

namespace App\Common\Enum;

class CommonEnum
{
    const ENABLE = 1;
    const UNABLE = 0;
    const DEFAULT_PAGE_NUM = 9;
    const NUM_FOUR = 4;
    const RECOMMEND_NUM = 6;

    const INVITE_CODE_KEY = 'invite_code';
    const CACHE_TIME = (86400 * 30);
    const CACHE_SHORT_TIME = (60 * 20);
}

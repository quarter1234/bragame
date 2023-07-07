<?php

namespace App\Helper;

use App\Common\Enum\CommonEnum;
use App\Repositories\ImageRepository;

class UserHelper 
{
    public static function avatar($usericon)
    {
        return '/static/head/head_'.$usericon.'.png';
    }
}
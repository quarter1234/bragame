<?php

namespace App\Helper;

use App\Cache\SConfigVipCache;

class ViewHelper
{
    public static function getTemplate($template)
    {
        return config('view.template') . '.' . $template;
    }
}
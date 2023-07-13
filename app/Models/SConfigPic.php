<?php
namespace App\Models;

class SConfigPic extends BaseMoel
{
    public $timestamps = false;  

    public function getImgAttribute($value)
    {
        return 'http://125.77.168.72:82'.$value;
    }
}
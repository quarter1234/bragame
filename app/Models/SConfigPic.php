<?php
namespace App\Models;

class SConfigPic extends BaseMoel
{
    public $timestamps = false;  

    public function getImgAttribute($value)
    {
        return env("APP_ADMINURL").$value;
    }
}
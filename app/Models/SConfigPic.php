<?php
namespace App\Models;

class SConfigPic extends BaseMoel
{
    public $timestamps = false;  

    public function getImgAttribute($value)
    {
        return config('app.url').':82'.$value;
    }
}
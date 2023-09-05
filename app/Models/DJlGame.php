<?php
namespace App\Models;

class DJlGame extends BaseMoel
{
    public $timestamps = false;
    protected $table = 'd_jl_game';

    public function getIconAttribute($value)
    {
        // return 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public'.$value;
        return config('app.url').':82' .  $value;
    }
}

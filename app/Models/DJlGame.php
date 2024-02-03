<?php
namespace App\Models;
use App\Common\Enum\CommonEnum;
class DJlGame extends BaseMoel
{
    public $timestamps = false;
    protected $table = 'd_jl_game';

    public function getIconAttribute($value)
    {
        $pre = env('REMOTE_IMG_URL', 'http://localhost') . CommonEnum::S3_PATH_ARR[config('view.template')];
        return $pre.$value;
        // return config('app.url').':82' .  $value;
    }
}

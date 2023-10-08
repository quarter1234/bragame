<?php
namespace App\Models;
use App\Common\Enum\CommonEnum;
class DPgProGame extends BaseMoel
{
    public $timestamps = false;
    protected $table = 'd_pg_pro_game';

    public function getIconAttribute($value)
    {
        $pre = CommonEnum::S3_PATH_ARR[config('view.template')];
        return $pre.$value;
        // return config('app.url').':82' .  $value;
    }
}
<?php

namespace App\Models;

class DPgGameBets extends BaseMoel
{
    public $timestamps = false;
    protected $table = 'd_pg_game_bets';

    // protected $attributes = ['format_platform', 'format_create_time'];
    protected $appends = ['format_platform', 'format_create_time'];

    public function getFormatCreateTimeAttribute($value)
    {
        return date('Y-m-d H:i:s', $this->attributes['bet_stamp']);
    }

    public function getFormatPlatformAttribute($value)
    {
        $platArr = [
            'PGS' => 'PG',
            'PP' => 'PP',
        ];

        return $platArr[$this->attributes['platform']];
    } 
}

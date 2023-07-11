<?php
namespace App\Models;

class DPgGame extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_pg_game'; 

    public function getIconAttribute($value)
    {
        return 'http://15.228.181.144:82'.$value;
    }
}
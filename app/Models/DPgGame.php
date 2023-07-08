<?php
namespace App\Models;

class DPgGame extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_pg_game'; 

    public function getIconAttribute($value)
    {
        return 'http://18.228.17.241:82'.$value;
    }
}
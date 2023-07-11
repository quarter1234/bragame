<?php
namespace App\Models;

class DPgGame extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_pg_game'; 

    public function getIconAttribute($value)
    {
        return 'http://54.207.90.207:82'.$value;
    }
}
<?php
namespace App\Models;

class DPgGame extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_pg_game'; 

    public function getIconAttribute($value)
    {
        return 'https://baxigame1.s3.sa-east-1.amazonaws.com/bx_4/public'.$value;
    }
}
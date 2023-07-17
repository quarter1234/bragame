<?php
namespace App\Models;

class DUserMailNew extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_user_mail_new'; 

    public function getAttachAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getTimestampAttribute($value)
    {
        return date('Y-m-d H:i:s', $value);
    }
    
}
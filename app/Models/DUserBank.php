<?php
namespace App\Models;

class DUserBank extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_user_bank'; 
    protected $appends = ['format_account'];

    public function getFormatAccountAttribute($value)
    {
        if (!array_key_exists('account', $this->attributes)) {
            return '';
        }
        return hideString($this->attributes['account'], 3, 4);
    }
}
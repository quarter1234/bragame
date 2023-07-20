<?php
namespace App\Models;

class DUserRecharge extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_user_recharge'; 

    protected $attributes = ['format_status', 'format_create_time'];
    protected $appends = ['format_status', 'format_create_time'];

    public function getFormatStatusAttribute($value)
    {
        $statusArr = [
            0 => trans('member.pending'), 
            1 => trans('member.processing'), 
            2 => trans('member.pay_success'), 
            3 => trans('member.manual_arrival'), 
        ];
        
        return $statusArr[$this->attributes['status']];
    }

    public function getFormatCreateTimeAttribute($value)
    {
        return date('Y-m-d H:i:s', $this->attributes['create_time']);
    }
}
<?php
namespace App\Models;

class DUserDraw extends BaseMoel
{
    public $timestamps = false;  
    protected $table = 'd_user_draw'; 

    // public function getStatusAttribute($value)
    // {
    //     $statusArr = [
    //         0 => trans('member.pending'),
    //         1 => trans('member.processing'), 
    //         2 => trans('member.completed'), 
    //         3 => trans('member.refuse'), 
    //     ];
    //     return $statusArr[$value];
    // }

    public function getCreateTimeAttribute($value)
    {
        return date('Y-m-d H:i:s', $value);
    }

    
}
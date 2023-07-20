<?php
namespace App\Models;

class DUserRecharge extends BaseMoel
{
    public $timestamps = false;
    protected $table = 'd_user_recharge';

    public function getStatusAttribute($value)
    {
        $statusArr = [
            1 => trans('member.processing'),
            2 => trans('member.pay_success'),
            3 => trans('member.manual_arrival'),
        ];
        return $statusArr[$value];
    }

    public function getCreateTimeAttribute($value)
    {
        return date('Y-m-d H:i:s', $value);
    }


}

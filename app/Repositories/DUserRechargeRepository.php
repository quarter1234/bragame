<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DUserRecharge;

class DUserRechargeRepository extends Repository
{
    function model()
    {
        return DUserRecharge::class;
    }

    public function getRechargeAmount($uids = [], $startTeime, $endTime)
    {
        return $this->model()::whereIn('uid', $uids)
        ->where('create_time', '>=', $startTeime)
        ->where('create_time', '<=', $endTime)
        ->where('status', '<=', 2)
        ->sum('count');
    }

    public function getFirstPayNum($uids = [], $startTeime, $endTime)
    {
        return $this->model()::whereIn('uid', $uids)
        ->where('create_time', '>=', $startTeime)
        ->where('create_time', '<=', $endTime)
        ->where('status', '<=', 2)
        ->where('isfirst', '<=', 1)
        ->count('id');
    }

    public function getRechargeByOrderId($orderId){
        return $this->model()::where('orderid', $orderId)->first();
    }

    public function getRecharges($user, $startTime, $endTime)
    {
        return $this->model()::where('uid', $user->uid)
        ->where('create_time', '>', $startTime)
        ->where('create_time', '<', $endTime)
        ->whereIn('status', [1, 2, 3])
        ->orderBy('id', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }
}

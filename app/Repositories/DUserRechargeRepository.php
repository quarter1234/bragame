<?php
namespace App\Repositories;

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

    public function getUserRechargeNum($uid){
        return $this->model()::where('uid', $uid)
                            ->where('status', 2)
                            ->count('id');
    }

    public function upUserRecharge($orderId, $data){
        if($orderId && !empty($data)){
            $this->model()::where("orderid", $orderId)
                            ->update($data);
        }
    }
}

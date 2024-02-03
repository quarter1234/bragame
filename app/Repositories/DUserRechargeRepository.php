<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DUserRecharge;
use Illuminate\Support\Facades\DB;

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
        ->where('status', '=', 2)
        ->sum('count');
    }

    public function getFirstPayNum($uids = [], $startTeime, $endTime)
    {
        return $this->model()::whereIn('uid', $uids)
            ->where('create_time', '>=', $startTeime)
            ->where('create_time', '<=', $endTime)
            ->where('status', '=', 2)
            ->where('isfirst', '=', 1)
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

    public function getRecharges($user, $startTime, $endTime)
    {
        return $this->model()::where('uid', $user->uid)
        ->where('create_time', '>', $startTime)
        ->where('create_time', '<', $endTime)
        ->whereIn('status', [1, 2, 3])
        ->orderBy('id', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }

    public function getUserRechageByGroups($user, $groupIds)
    {
        return $this->model()::select(DB::raw('count(id) as t'), 'groupid','channelid','category')
        ->where('uid', $user->uid)
        ->whereIn('groupid', $groupIds)
        ->where('status', 2)
        ->groupBy(['groupid','channelid', 'category'])
        ->get()->toArray();
    }

    public function getUserRechargeToday($todaytime, $user, $groupIds)
    {
        return $this->model()::select(DB::raw('count(id) as t'), 'groupid','channelid','category')
        ->where('create_time','>', $todaytime)
        ->where('uid', $user->uid)
        ->whereIn('groupid', $groupIds)
        ->where('status', 2)
        ->groupBy(['groupid','channelid', 'category'])
        ->get()->toArray();
    }
}

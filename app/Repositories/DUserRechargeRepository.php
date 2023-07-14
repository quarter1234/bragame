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
}
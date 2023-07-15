<?php
namespace App\Repositories;

use App\Models\DCommission;

class DCommissionRepository extends Repository
{
    function model()
    {
        return DCommission::class;
    }

    public function getInfoByUid(int $uid, $type)
    {
        return $this->model()::where('uid', $uid)->where('type', $type)->first();
    }

    public function storeCommission(array $data){
        return $this->create($data);
    }

    public function getOneTotalBetCoin($uid, $startTeime, $endTime)
    {
        return $this->model()::where('parentid', $uid)
        ->where('create_time', '>=', $startTeime)
        ->where('create_time', '<=', $endTime)
        ->sum('betcoin');
    }

    public function getTwoTotalBetCoin($uid, $startTeime, $endTime)
    {
        return $this->model()::where('pparentid', $uid)
        ->where('create_time', '>=', $startTeime)
        ->where('create_time', '<=', $endTime)
        ->sum('betcoin');
    }
}

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
}
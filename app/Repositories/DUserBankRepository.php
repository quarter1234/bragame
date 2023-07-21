<?php
namespace App\Repositories;

use App\Models\DUserBank;

class DUserBankRepository extends Repository
{
    function model()
    {
        return DUserBank::class;
    }

    public function getUserBankInfo(int $bankId, int $uid)
    {
        return $this->model()::where('id', $bankId)->where('uid', $uid)->first();
    }
}
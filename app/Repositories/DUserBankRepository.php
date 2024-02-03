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

    public function getInfoByAccount($account)
    {
        return $this->model()::where('account', $account)->first();
    }

    public function getBanksByUid(int $uid)
    {
        return $this->model()::where('uid', $uid)->where('status', 2)->get()->toArray();
    }

    public function getBankInfoByUid(int $uid)
    {
        return $this->model()::where('uid', $uid)->where('status', 2)->first();
    }
}
<?php

namespace App\Repositories;

use App\Models\DBank;

class DBankRepository extends Repository
{
    //
    public function model()
    {
        return DBank::class;
    }

    public function getBankInfo(int $uid)
    {
        return $this->model()::where('uid', $uid)->first();
    }
}
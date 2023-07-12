<?php

namespace App\Repositories;

use App\Models\CoinLog;

class CoinLogRepository extends Repository
{
    //
    public function model()
    {
        return CoinLog::class;
    }

    public function storeCoinLog(array $data){
        return $this->create($data);
    }
}

<?php

namespace App\Repositories;

use App\Models\DCenterTaxLog;

class DCenterTaxLogRepository extends Repository
{
    //
    public function model()
    {
        return DCenterTaxLog::class;
    }

    public function storeCenterTaxLog(array $data){
        return $this->create($data);
    }
}

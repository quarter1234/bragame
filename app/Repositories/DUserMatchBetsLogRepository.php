<?php
namespace App\Repositories;

use App\Models\DUserMatchBetsLog;

class DUserMatchBetsLogRepository extends Repository
{
    public function model()
    {
        return DUserMatchBetsLog::class;
    }

    public function storeMatchBetLog(array $data){
        return $this->create($data);
    }
}

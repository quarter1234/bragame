<?php

namespace App\Repositories;

use App\Models\SBetConfig;

class SBetConfigRepository extends Repository
{
    //
    public function model()
    {
        return SBetConfig::class;
    }

    public function storeConfig(array $data){
        return $this->create($data);
    }
}

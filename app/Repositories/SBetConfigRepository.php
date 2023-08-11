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

    public function getConfig($k){
        if($k){
            return $this->model()::where("k", $k)->first();
        }

        return null;
    }
}

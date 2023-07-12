<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SConfig;

class SConfigRepository extends Repository
{
    function model()
    {
        return SConfig::class;
    }

    public function getVal($key){
        if($key){
            return $this->model()::where("k", $key)->first();
        }

        return null;
    }


}

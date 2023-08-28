<?php

namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SPayCfgDrawcom;

class SPayCfgDrawcomRepository extends Repository
{
    //
    public function model()
    {
        return SPayCfgDrawcom::class;
    }

    public function getDataBySvip($svip) 
    {
        $model = $this->model()::where('status', CommonEnum::ENABLE);

        if($svip) {
             $model =  $model->where('svip', 'like', '%'.$svip.',%');
        }
        
        return $model->orderBy('id','desc')->get();
    }

    public function getEnFirstData()
    {
        return $this->model()::where('status', CommonEnum::ENABLE)->first();
    }
}

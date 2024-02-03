<?php

namespace App\Repositories;

use App\Models\SPayCfgChannel;

class SPayCfgChannelRepository extends Repository
{
    public function model()
    {
        return SPayCfgChannel::class;
    }

    public function getListByGroup($groupid, $svip, $isFirstPay = 0)
    {
        $model = $this->model()::where('groupid', $groupid)
        ->where('svip', 'like', '%' . $svip . ',%')
        ->where('status', 1);

        if($isFirstPay == 1){
            $model = $model->where('planid', 1);
        } else {
            $model = $model->where('planid','<>', 1);
        }

        return $model->orderBy('pay_view_coin', 'asc')->get()->toArray();
    }
}
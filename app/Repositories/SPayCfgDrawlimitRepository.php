<?php

namespace App\Repositories;

use App\Models\SPayCfgDrawlimit;

class SPayCfgDrawlimitRepository extends Repository
{
    //
    public function model()
    {
        return SPayCfgDrawlimit::class;
    }

    //获取支付等级对方的支付分组方法
    public function getDataBySvip($uid, $svip, $superArr=[]) 
    {
        return $this->model()::where(function($query) use($uid, $svip, $superArr){
            if ($uid) {
                $query->orWhere('useruid', $uid);
            }

            if($svip !== false) {
                $query->orWhere('svip', 'like', '%'.$svip.',%');
            }

            if(!empty($superArr)) {
                $query->orWhereIn('superuid', $superArr);
            }

        })->orderBy('id','asc')->get();
    }
}
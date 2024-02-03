<?php

namespace App\Repositories;

use App\Models\CoinLog;
use App\Common\Enum\CommonEnum;
use App\Common\Enum\GameEnum;

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

    public function getPgBets($user, $startTime, $endTime)
    {
        $res = $this->model()::where('uid', $user->uid)
            ->where('coin', '<>', 0)
            ->where('type', '=', 3)
            ->where('time', '>', $startTime)
            ->where('time', '<', $endTime)
            ->orderBy('id', 'desc')
            ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
        foreach ($res as &$val) {
            $val['coins'] = abs($val['coin']);
            $val['time'] = date('Y-m-d H:i:s', $val['time']);
        }
        return $res;
    }

    public function getCoinlog($user, $startTime, $endTime)
    {
        $res = $this->model()::where('uid', $user->uid)
            ->where('coin', '<>', 0)
            ->where('time', '>', $startTime)
            ->where('time', '<', $endTime)
            ->orderBy('id', 'desc')
            ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
        foreach ($res as &$val) {
            $val['coins'] = abs($val['coin']);
            if($val['coin'] > 0){
                $val['coin'] = "+".$val['coin'];
            }
            $val['time'] = date('Y-m-d H:i:s', $val['time']);
            $val['title'] = GameEnum::PDEFINE['TYPENAME'][$val['type']] ?? "null";
        }
        return $res;
    }
}

<?php
namespace App\Repositories;

use App\Models\DUserMatchBets;

class DUserMatchBetsRepository extends Repository
{
    public function model()
    {
        return DUserMatchBets::class;
    }

    public function storeCenterTaxLog(array $data){
        return $this->create($data);
    }

    public function getUserMatchBet($uid){
        if($uid){
           return $this->model()::where("uid", $uid)
                    ->where("opt_status", 0)
                    ->orderBy('from_type', 'asc')
                    ->first();
        }

        return null;
    }

    public function optCost($uid, $deductId){
        if($uid && $deductId){
            return $this->model()::where("uid", $uid)
                        ->where("opt_status", 0)
                        ->where('id', '<>', $deductId)
                        ->first();
        }

        return 0;
    }

    public function setMatchBetsStatus($id, $userBets, $canDraw){
        $now = time();
        $upData = [
            "opt_status" => 1,
            "remove_bets" => $userBets,
            "can_draw" => $canDraw,
            "update_time" => $now,
        ];
        $this->model()::where('id', $id)
                        ->update($upData);
    }
}

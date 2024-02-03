<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\DUserMatchBets;

class DUserMatchBetsRepository extends Repository
{
    public function model()
    {
        return DUserMatchBets::class;
    }

    public function getUserMatchBet($uid){
        if($uid){
           return $this->model()::where("uid", $uid)
                    ->where("opt_status", 0)
                    // ->orderBy('from_type', 'asc')
                    ->orderByRaw(DB::raw("FIELD(from_type, 2, 3, 5, 1)"))
                    ->first();
        }

        return null;
    }

    public function optCost($uid, $deductId){
        if($uid && $deductId){
            return $this->model()::where("uid", $uid)
                        ->where("opt_status", 0)
                        ->where('id', '<>', $deductId)
                        ->sum('amount');
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

    public function addMatchBets($uid, $amount, $fromType, $betMul, $orderid){
        $now = time();
        $addData = [
            'uid' => $uid,
            'amount' => $amount,
            'from_type' => $fromType,
            'bet_mul' => $betMul,
            'orderid' => $orderid,
            'create_time' => $now,
        ];

        return $this->create($addData);
    }
}

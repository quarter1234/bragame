<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DPgGameBets;

class DPgGameBetsRepository extends Repository
{
    function model()
    {
        return DPgGameBets::class;
    }

    public function insert(array $data){
        return  $this->model()::insertGetId($data);
    }

    public function storePgGameBet($id, $data){
        if($id && !empty($data)){
            $this->model()::where("id", $id)
                            ->update($data);
        }
    }

    public function getPgBets($user, $startTime, $endTime)
    {
        return $this->model()::where('uid', $user->uid)
        ->where('bet_amount', '<>', 0)
        ->where('bet_stamp', '>', $startTime)
        ->where('bet_stamp', '<', $endTime)
        ->where('status', CommonEnum::ENABLE)
        ->orderBy('id', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }

}

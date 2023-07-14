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
}

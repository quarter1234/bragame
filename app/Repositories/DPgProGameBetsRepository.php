<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DPgProGameBets;

class DPgProGameBetsRepository extends Repository
{
    function model()
    {
        return DPgProGameBets::class;
    }

    public function insert(array $data){
        return  $this->model()::insertGetId($data);
    }

    public function storePgProGameBet($id, $data){
        if($id && !empty($data)){
            $this->model()::where("id", $id)
                ->update($data);
        }
    }
}

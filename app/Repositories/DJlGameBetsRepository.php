<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DJlGameBets;

class DJlGameBetsRepository extends Repository
{
    function model()
    {
        return DJlGameBets::class;
    }

    public function insert(array $data){
        return  $this->model()::insertGetId($data);
    }

    public function storeJlGameBet($id, $data){
        if($id && !empty($data)){
            $this->model()::where("id", $id)
                ->update($data);
        }
    }
}

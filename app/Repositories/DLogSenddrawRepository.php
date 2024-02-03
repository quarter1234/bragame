<?php

namespace App\Repositories;

use App\Models\DLogSenddraw;

class DLogSenddrawRepository extends Repository
{
    //
    public function model()
    {
        return DLogSenddraw::class;
    }

    public function storeSendDrawLog(array $data){
        return $this->create($data);
    }
}

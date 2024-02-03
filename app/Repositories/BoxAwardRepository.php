<?php
namespace App\Repositories;

use App\Models\DBoxAward;

class BoxAwardRepository extends Repository
{
    //
    public function model()
    {
        return DBoxAward::class;
    }

    public function getBoxAwardManNum($uid, $startTimeStr, $endTimeStr){
        return $this->model()::where('award_date', '>=', $startTimeStr)
                        ->where('award_date', '<=', $endTimeStr)
                        ->where('uid', $uid)
                        ->sum('man_num');
    }
}

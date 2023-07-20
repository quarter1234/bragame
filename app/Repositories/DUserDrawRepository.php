<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DUserDraw;

class DUserDrawRepository extends Repository
{
    function model()
    {
        return DUserDraw::class;
    }

    public function getDraws($user, $startTime, $endTime)
    {
        return $this->model()::where('uid', $user->uid)
        ->where('create_time', '>', $startTime)
        ->where('create_time', '<', $endTime)
        ->whereIn('status', [0, 1, 2, 3])
        ->orderBy('id', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }
}
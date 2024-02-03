<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SNoticeIndex;

class SNoticeIndexRepository extends Repository
{
    function model()
    {
        return SNoticeIndex::class;
    }

    public function getNoticeIndex($currentTime)
    {
        return $this->model()::where('status', CommonEnum::ENABLE)
        ->where('start_time', '<', $currentTime)
        ->where('end_time', '>', $currentTime)
        ->first();
    }
}
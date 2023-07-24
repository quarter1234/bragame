<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DRedPacket;

class DRedPacketRepository extends Repository
{
    function model()
    {
        return DRedPacket::class;
    }

    public function getCurrentInfo($currentTime)
    {
        return $this->model()::where('status', CommonEnum::ENABLE)
        ->where('start_time', '<', $currentTime)
        ->where('end_time', '>', $currentTime)
        ->first();
    }
}
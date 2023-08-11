<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DRedPacketUser;

class DRedPacketUserRepository extends Repository
{
    function model()
    {
        return DRedPacketUser::class;
    }

    function getUserLottery($user, $packInfo)
    {
        return $this->model()::where('uid', $user->uid)
        ->where('red_packet_id', $packInfo->id)
        ->first();
    }

    public function store($user, $coin, $packInfo, $status = 0)
    {
        $data = [];
        $data['uid'] = $user->uid;
        $data['coin'] = $coin;
        $data['status'] = $status;
        $data['red_packet_id'] = $packInfo->id;
        $data['create_time'] = time();

        return $this->create($data);
    }
}
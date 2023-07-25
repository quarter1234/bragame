<?php
namespace App\Repositories;

use App\Models\DPgGameUserLog;

class DPgGameUserLogRepository extends Repository
{
    function model()
    {
        return DPgGameUserLog::class;
    }

    public function store($user, $params)
    {
        $data = [];
        $data['uid'] = $user['uid'];
        $data['game_id'] = $params['game_id'];
        $data['coin'] = $user['coin'];
        $data['ip'] = $params['ip'];
        $data['create_time'] = time();
        
        $this->create($data);
    }
}
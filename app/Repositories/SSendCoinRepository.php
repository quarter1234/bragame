<?php
namespace App\Repositories;

use App\Models\SSendCoin;

class SSendCoinRepository extends Repository
{
    function model()
    {
        return SSendCoin::class;
    }

    public function store($parentInfo, $coin,$actType, $svip)
    {
        $data = [];
        $data['uid'] = $parentInfo->uid;
        $data['coin'] = $coin;
        $data['create_time'] = time();
        $data['act'] = $actType;
        $data['level'] = 0;
        $data['scale'] = 1;
        $data['diamond'] = 0;
        $data['svip'] = $svip;
        $this->create();
    }

    public function storeSendCoinLog(array $data){
        return $this->create($data);
    }
}

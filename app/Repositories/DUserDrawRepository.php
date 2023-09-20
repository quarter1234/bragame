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

    public function upDraw($id, $data){
        if($id && $data){
            $this->model()::where("id", $id)
                            ->update($data);
        }
    }

    public function storeDraw($user, $params, $bankInfo)
    {
        $data = [];
        $data['uid'] = $user->uid;
        $data['orderid'] = make_order_no($user->uid);
        $data['cat'] = $bankInfo['cat'];
        $data['bankid'] = $bankInfo['id'];
        $data['userbankid'] = $bankInfo['id'];
        $data['account'] = $bankInfo['account'];
        $data['create_time'] = time();
        $data['coin'] = $params['coin'];
        $data['status'] = 0;
        $data['taxthird'] = 0;
        $data['tax'] = 0;
        $data['channelid'] = 0;

        return $this->create($data);
    }

    public function getUserAllCoin(int $uid)
    {
        return $this->model()::where('uid', $uid)->sum('coin');
    }

    public function getWaitDealCount(int $uid)
    {
        return $this->model()::where('uid', $uid)
        ->where('status',  CommonEnum::UNABLE)
        ->count('id');
    }

    public function getTodayTimes(int $uid, $isToday = true)
    {
        $model = $this->model()::where('uid', $uid);

        if($isToday) {
            $model = $model->where('create_time', '>=', strtotime(date('Y-m-d')));
        }

        return $model->count('id');
    }

    public function getTodayAllCoin(int $uid, $isToday = true)
    {
        $model = $this->model()::where('uid', $uid);

        if($isToday) {
            $model = $model->where('create_time', '>=', strtotime(date('Y-m-d')));
        }

        return $model->sum('coin');
    }

    public function getLastInfo(int $uid)
    {
        return $this->model()::where('uid', $uid)->orderBy('id', 'desc')->first();
    }
}

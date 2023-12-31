<?php
namespace App\Repositories;

use App\Models\DUserInvite;
use Illuminate\Support\Facades\DB;

class DUserInviteRepository extends Repository
{
    function model()
    {
        return DUserInvite::class;
    }

    public function getInviteCount(int $inviteUid)
    {
        return $this->model()::where('invit_uid', $inviteUid)->max('ord');
    }

    /**
     * 保存邀请记录
     * @param mixed $register
     * @param mixed $inviteUser
     * @param int $ordNum
     * @param string $rewards
     * @return mixed
     */
    public function storeInvite($register, $inviteUser, int $ordNum, string $rewards, int $isFilter = 1)
    {
        $data = [];
        $data['uid'] = $register->uid;
        $data['playername'] = $register->playername;
        $data['usericon'] = $register->usericon;
        $data['invit_uid'] = $inviteUser->uid;
        $data['create_time'] = time();
        $data['status'] = 0;
        $data['ord'] = $ordNum;
        $data['rewards'] = $rewards;
        $data['is_filter'] = $isFilter;

        return $this->create($data);
    }

    public function inviteByUidByTime($uid = [], $startTime, $endTime)
    {
        return $this->model()::whereIn('invit_uid', $uid)
        ->where('create_time', '>=', $startTime)
        ->where('create_time', '<=', $endTime)
        ->pluck('uid')->toArray();
    }

    public function getPayUserCount($uid, $startTime, $endTime){
        return   $this->model()::join('d_user_recharge','d_user_invite.uid','=','d_user_recharge.uid')
                    ->where("d_user_recharge.status", 2)
                    ->where("d_user_invite.is_filter", 1)
                    ->where("d_user_invite.create_time", ">=", $startTime)
                    ->where("d_user_invite.create_time", "<=", $endTime)
                    ->where("d_user_recharge.create_time", ">=", $startTime)
                    ->where("d_user_recharge.create_time", "<=", $endTime)
                    ->where("d_user_invite.invit_uid", $uid)
                    ->select("d_user_invite.uid")
                    ->groupBy('d_user_invite.uid')
                    ->get();
    }

    public function getTestPayUserCount($uid, $startTime, $endTime){
        $list =  $this->model()::join('d_user_recharge','d_user_invite.uid','=','d_user_recharge.uid')
                ->where("d_user_recharge.status", 2)
                ->where("d_user_invite.is_filter", 1)
                ->where("d_user_invite.create_time", ">=", $startTime)
                ->where("d_user_invite.create_time", "<=", $endTime)
                ->where("d_user_recharge.create_time", ">=", $startTime)
                ->where("d_user_recharge.create_time", "<=", $endTime)
                ->where("d_user_invite.invit_uid", $uid)
                ->select("d_user_invite.uid")
                ->groupBy('d_user_invite.uid')
                ->get();

        return $list->count();
    }

    public function getPayUsers($uids, $startTime, $endTime, $isFilter = true){
        $query = $this->model()::join('d_user_recharge','d_user_invite.uid','=','d_user_recharge.uid')
                    ->where("d_user_recharge.status", 2)
                    ->where("d_user_invite.create_time", ">=", $startTime)
                    ->where("d_user_invite.create_time", "<=", $endTime)
                    ->where("d_user_recharge.create_time", ">=", $startTime)
                    ->where("d_user_recharge.create_time", "<=", $endTime)
                    ->select("d_user_invite.uid as uid")
                    ->groupBy('d_user_invite.uid');
                    if(is_array($uids)){
                        $query->whereIn("d_user_invite.invit_uid", $uids);
                    }
                    else{
                        $query->where("d_user_invite.invit_uid", $uids);
                    }
        if($isFilter){
            $query->where("d_user_invite.is_filter", 1);
        }

        return $query->get();
    }
}

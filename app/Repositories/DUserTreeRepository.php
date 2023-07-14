<?php
namespace App\Repositories;

use App\Models\DuserTree;

class DUserTreeRepository extends Repository
{
    function model()
    {
        return DuserTree::class;
    }

    /**
     * 获取邀请者树关系
     * @param integer $inviteUid
     * @return mixed
     */
    public function getInviteTree(int $inviteUid)
    {
        return $this->model()::where('descendant_id', $inviteUid)->orderBy('id', 'desc')->get();
    }

    /**
     * 获取绑定关系
     * @param integer $registerUid
     * @param integer $inviteUid
     * @return mixed
     */
    public function getUserBind(int $registerUid, int $inviteUid)
    {
        return $this->model()::where(function($query) use($inviteUid, $registerUid) {
            $query->where('ancestor_id',$inviteUid)->where('descendant_id', $registerUid);
        })
        ->orWhere(function ($query) use ($inviteUid, $registerUid) {
            $query->where('ancestor_id',$registerUid)->where('descendant_id', $inviteUid);
        })->first();
    }

    public function storeInviteTree($tree, $register, $agent = 0)
    {
        $data = [];
        $data['ancestor_id'] = $tree['ancestor_id'];
        $data['descendant_id'] = $register->uid;
        $data['descendant_agent'] = $agent;
        $data['ancestor_h'] = intval($tree['ancestor_h']) + 1;
        $this->create($data);
    }

    public function getPrentInviteTree($uid, $len){
        return $this->model()::where("descendant_id", $uid)->where("ancestor_h", $len)->first();
    }

    public function getTree($uid, $heights = [])
    {
        return $this->model()::with('descendant:uid,playername,create_time')->where('ancestor_id', $uid)->whereIn('ancestor_h', $heights)->get();
    }

    public function getTreeCount($uid, $heights = [])
    {
        return $this->model()::where('ancestor_id', $uid)->whereIn('ancestor_h', $heights)->count();
    }
}

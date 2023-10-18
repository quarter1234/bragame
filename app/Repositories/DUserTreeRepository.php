<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
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
        return $this->model()::where('descendant_id', $inviteUid)
        ->where('ancestor_h', '>', 0)
        ->orderBy('id', 'desc')
        ->get();
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

    public function getInviteInfo($ancestorId, $descendantId, $ancestorH)
    {
        return $this->model()::where('ancestor_id', $ancestorId)
        ->where('descendant_id', $descendantId)
        ->where('ancestor_h', $ancestorH)
        ->first();
    }

    public function storeInviteTree($tree, $register, $agent = 0)
    {
        $ancestorH = intval($tree['ancestor_h']) + 1;

        $haveInfo = $this->getInviteInfo($tree['ancestor_id'], $register->uid, $ancestorH);
        if($haveInfo) {
            return false;
        }

        $data = [];
        $data['ancestor_id'] = $tree['ancestor_id'];
        $data['descendant_id'] = $register->uid;
        $data['descendant_agent'] = $agent;
        $data['ancestor_h'] = $ancestorH;

        return $this->create($data);
    }

    public function storeTree($invitedUid, $registerUid, $agent = 0, $ancestorH = 0)
    {
        $haveInfo = $this->getInviteInfo($invitedUid, $registerUid, $ancestorH);
        if($haveInfo) {
            return false;
        }

        $data = [];
        $data['ancestor_id'] = $invitedUid;
        $data['descendant_id'] = $registerUid;
        $data['descendant_agent'] = $agent;
        $data['ancestor_h'] = $ancestorH;
        return $this->create($data);
    }

    public function getPrentInviteTree($uid, $len){
        return $this->model()::where("descendant_id", $uid)->where("ancestor_h", $len)->first();
    }

    public function getTree($uid, $heights = [])
    {
        return $this->model()::with('descendant:uid,playername,create_time')
        ->where('ancestor_id', $uid)
        ->whereIn('ancestor_h', $heights)
        ->orderBy('id', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_INVITE_NUM);
    }

    public function getTreeCount($uid, $heights = [])
    {
        return $this->model()::where('ancestor_id', $uid)->whereIn('ancestor_h', $heights)->count();
    }

    public function checkUidInTeamBan($uid)
    {
        $count = $this->model()::join('d_user', 'd_user_tree.ancestor_id', '=', 'd_user.uid')
                    ->where('d_user.team_ban', CommonEnum::USER_TEAM_BAN_BLOCK)
                    ->where('d_user_tree.descendant_id', $uid)
                    ->count();
        if($count > 0)
        {
            return true;
        }

        return false;
    }
}

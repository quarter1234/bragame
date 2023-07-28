<?php

namespace App\Listeners;

use App\Common\Enum\GameEnum;
use App\Events\RegisterEvent;
use App\Helper\RewardHelper;
use App\Helper\SystemConfigHelper;
use App\Helper\UserHelper;
use App\Repositories\DUserBindRepository;
use App\Repositories\DUserInviteRepository;
use App\Repositories\DUserTreeRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class RegisterListener implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    /**
     * 注册事件处理
     * @param  \App\Events\RegisterEvent  $event
     * @return mixed
     */
    public function handle(RegisterEvent $event)
    {
        $register = $event->registerUser;
        $inviteCode = $event->inviteCode;
        if(!$inviteCode) {
            return false;
        }

        // 已经有绑定过的直接退出
        if(intval($register->invit_uid) > 0) {
            return false;
        }

        // 邀请者
        $inviteUser = UserHelper::getUserByCode($inviteCode);
        if(!$inviteUser) {
            return false;
        }

        if($inviteUser->uid == $register->uid) {
            return false;
        }

        if($inviteUser->forbidcode == 1) {
            return false;
        }

        $treeRepo = app()->make(DUserTreeRepository::class);
        $hasBind = $treeRepo->getUserBind($register->uid, $inviteUser->uid);
        if($hasBind) {
            return false;
        }

        $inviteRepo = app()->make(DUserInviteRepository::class);
        $ordNum = $inviteRepo->getInviteCount($inviteUser->uid);
        $ordNum = intval($ordNum) + 1;

        $inviteConfig = SystemConfigHelper::getByKey('invite');
        $rewards = ['type' => 1, 'count' => $inviteConfig['invite']['coin1'] ?? 0];

        $inviteRepo->storeInvite($register, $inviteUser, $ordNum, json_encode($rewards));

        $register->invit_uid = $inviteUser->uid;
        $register->save();

        $inviteUser->invitednum = intval($inviteUser->invitednum)  + 1;
        $inviteUser->save();

        // 绑定之前关系表
        $invitedList = $treeRepo->getInviteTree($inviteUser->uid)->toArray();
        if($invitedList) {
            foreach ($invitedList as $item) {
                $treeRepo->storeInviteTree($item, $register);
            }
        }

        // 也要把自己算进去
        $treeRepo->storeTree($inviteUser->uid, $register->uid, 0, 1);
        $treeRepo->storeTree($register->uid, $register->uid, 0, 0);
        $this->storeUserBind($register);
        
        // 删除缓存数据
        $invitePage1 = "share:invite:list:". $inviteUser->uid. '_' . 1;
        Cache::forget($invitePage1);

        $invitePage2 = "share:invite:list:". $inviteUser->uid. '_' . 2;
        Cache::forget($invitePage2);
        $invitePage3 = "share:invite:list:". $inviteUser->uid. '_' . 3;
        Cache::forget($invitePage3);

        $totalCacheKey = "share:invite:total:". $inviteUser->uid;
        Cache::forget($totalCacheKey);

        file_put_contents('/tmp/register.log', json_encode($register).PHP_EOL, FILE_APPEND);

        // 代理返利配置
        // if($inviteConfig['invite']['rtype'] == 2) {
        //     // 如果之前没有获取
        //     $commissionRepo = app()->make(DCommissionRepository::class);
        //     $hasCommission = $commissionRepo->getInfoByUid($register->uid, 1);
        //     if(!$hasCommission) {
        //         RewardHelper::addSuperiorRewards(
        //             $register->uid,
        //             GameEnum::PDEFINE['TYPE']['SOURCE']['REG'],
        //             $inviteConfig['invite']['coin1'],
        //             $inviteConfig['invite']['rtype']
        //         );
        //     }
        // }
    }

    private function storeUserBind($registerUser)
    {
        $bindRepo = app()->make(DUserBindRepository::class);

        $data = [];
        $data['uid'] = $registerUser['uid'];
        $data['unionid'] = $registerUser['phone'] ?? '';
        $data['passwd'] = $registerUser['password'] ?? '';
        $data['create_time'] = time();
       
        $bindRepo->create($data);
    }
}

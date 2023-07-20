<?php

namespace App\Listeners;

use App\Common\Enum\GameEnum;
use App\Events\RegisterEvent;
use App\Helper\RewardHelper;
use App\Helper\SystemConfigHelper;
use App\Helper\UserHelper;
use App\Repositories\DCommissionRepository;
use App\Repositories\DUserInviteRepository;
use App\Repositories\DUserTreeRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        // 注册者是否已经绑定过邀请码，如果有绑定过则直接退出
        

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

        $register->invit_uid = $register->uid;
        $register->save();

        $inviteUser->invitednum = intval($inviteUser->invitednum) + 1;
        $inviteUser->save();

        // 绑定关系表
        $invitedList = $treeRepo->getInviteTree($inviteUser->uid)->toArray();
        if($invitedList) {
            foreach ($invitedList as $item) {
                $treeRepo->storeInviteTree($item, $register);
            }
        } else {
            $treeRepo->storeTree($inviteUser->uid, $register->uid, 0, 1);
        }
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
}

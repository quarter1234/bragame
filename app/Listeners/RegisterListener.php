<?php

namespace App\Listeners;

use App\Events\RegisterEvent;
use App\Helper\SystemConfigHelper;
use App\Helper\UserHelper;
use App\Repositories\DUserInviteRepository;
use App\Repositories\DUserTreeRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterListener //implements ShouldQueue
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

        $inviteLog =$inviteRepo->storeInvite($register, $inviteUser, $ordNum, json_encode($rewards));

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
        }

        // 代理返利配置
        print_r($inviteConfig);die();

        print_r($rewards);die();


        file_put_contents('D:\www\logs.txt', $register->uid.PHP_EOL, FILE_APPEND);
    }
}

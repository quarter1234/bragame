<?php

namespace App\Http\Controllers;

use App\Common\Enum\GameEnum;
use App\Facades\User;
use App\Helper\RewardHelper;
use App\Helper\SystemConfigHelper;
use App\Helper\UserHelper;
use App\Helper\VipHelper;
use App\Repositories\DCommissionRepository;
use App\Services\ShareService;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
use App\Common\Enum\CommonEnum;
use App\Repositories\DUserTreeRepository;

class TestController extends Controller
{
    private $shareService;
    private $userService;
    public function __construct(ShareService $shareService, UserService $userService)
    {
        $this->shareService = $shareService;
        $this->userService = $userService;
    }

    private function crTestUser(){
        $len = 100;
        $phone = 10000000000;
        for($crNum = 1; $crNum <= $len; $crNum++){
            $params = [
                'playername' => "test" . $crNum,
                'password' => bcrypt('123456'),
                'usericon' => rand(1,11),
                'reg_ip' => '127.0.0.1',
                'login_ip' => '127.0.0.1',
                'create_time' => time(),
                'login_time' => time(),
                'token' => UserHelper::token(),
                'isbindphone' => CommonEnum::ENABLE,
                'coin' => 500,
                'is_test' => 1,
            ];
            
            $params['phone'] = $phone . '';
            $params['playername'] = 'guest' . $crNum;
            $registerUser =$this->userService->crUserData($params);
            if($registerUser) {
                $treeRepo = app()->make(DUserTreeRepository::class);
                $treeRepo->storeTree($registerUser->uid, $registerUser->uid, 0, 0);
                dump("用户{$phone}添加完毕");
                $phone = $phone + 1;
            }

            // if($crNum > 0 && $crNum % 100 == 0){
            //     usleep(100000);
            // }
        }
    }

    public function index(Request $request)
    {
        // $uid = $request->get("uid", false);
        // if($uid){
        //     $inviteConfig = SystemConfigHelper::getByKey('invite');
        //     if($inviteConfig['invite']['rtype'] == 2) {
        //         // 如果之前没有获取
        //         $commissionRepo = app()->make(DCommissionRepository::class);
        //         $hasCommission = $commissionRepo->getInfoByUid($uid, 1);
        //         if(!$hasCommission) {
        //             RewardHelper::addSuperiorRewards(
        //                 $uid,
        //                 GameEnum::PDEFINE['TYPE']['SOURCE']['REG'],
        //                 $inviteConfig['invite']['coin1'],
        //                 $inviteConfig['invite']['rtype']
        //             );
        //         }
        //     }
        // }
        $this->crTestUser();
    }
}

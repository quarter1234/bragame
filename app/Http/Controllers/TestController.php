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
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    private $shareService;
    public function __construct(ShareService $shareService)
    {
        $this->shareService = $shareService;
    }
    public function index(Request $request)
    {
        $uid = $request->get("uid", false);
        if($uid){
            $inviteConfig = SystemConfigHelper::getByKey('invite');
            if($inviteConfig['invite']['rtype'] == 2) {
                // 如果之前没有获取
                $commissionRepo = app()->make(DCommissionRepository::class);
                $hasCommission = $commissionRepo->getInfoByUid($uid, 1);
                if(!$hasCommission) {
                    RewardHelper::addSuperiorRewards(
                        $uid,
                        GameEnum::PDEFINE['TYPE']['SOURCE']['REG'],
                        $inviteConfig['invite']['coin1'],
                        $inviteConfig['invite']['rtype']
                    );
                }
            }
        }
    }
}

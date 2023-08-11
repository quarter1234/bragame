<?php

namespace App\Http\Controllers;

use App\Facades\User;
use App\Helper\UserHelper;
use App\Helper\VipHelper;
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
        $uid = 40001;
//        $dayStr = '2023-08-01';
//        $startTime = strtotime($dayStr);
//        $endTime = strtotime($dayStr . ' 23:59:59');
//        Log::debug("test-index:", [$startTime, $endTime]);
        VipHelper::useVipDiamond($uid, 25);
        return "succ";
        // $isNeedRand = UserHelper::getTestIsInviteFilter($uid, $startTime, $endTime);
        // return $this->shareService->getTestFirstRecharge($uid, $startTime, $endTime);
         // User::testStr();
    }
}

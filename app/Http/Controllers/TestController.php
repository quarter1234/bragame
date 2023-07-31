<?php

namespace App\Http\Controllers;

use App\Facades\User;
use App\Services\ShareService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    private $shareService;
    public function __construct(ShareService $shareService)
    {
        $this->shareService = $shareService;
    }
    public function index(Request $request)
    {
        $uid = 40016;
        $dayStr = date('Y-m-d');
        $startTime = strtotime($dayStr);
        $endTime = strtotime($dayStr . ' 23:59:59');
        return $this->shareService->getTestFirstRecharge($uid, $startTime, $endTime);
         // User::testStr();
    }
}

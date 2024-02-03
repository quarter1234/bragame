<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Lib\Result;
use App\Http\Controllers\Controller;
use App\Services\RedPackageService;
use Illuminate\Support\Facades\Auth;

class RedPackageController extends Controller
{
    private $redPackageService;

    public function __construct(RedPackageService $redPackageService)
    {
        $this->redPackageService = $redPackageService;
    }
    
    public function doLottery()
    {
        $user = Auth::user();
        $res = $this->redPackageService->doLottery($user);

        return Result::success($res);
    }
}
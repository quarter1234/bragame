<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\RechargeService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RechargeController extends Controller
{
    private $rechargeService;

    public function __construct(RechargeService $rechargeService)
    {
        $this->rechargeService = $rechargeService;

    }
    
    public function index()
    {
        $user = Auth::user();
        // $coin = $this->request->param('coin', 0); //此次充值金额
        $coin = 0;

        $data = [];
        $data['user'] = UserHelper::getUserCoin($user);
        
        $data['channels'] = $this->rechargeService->getChannels(0,  $data['user']['svip'], 0, $coin, $user);
        
        return view('mobile.pay.recharge', $data);
    }
}
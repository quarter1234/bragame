<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\UserHelper;
use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Services\RechargeService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Mobile\ShopRequest;
use App\Common\Lib\Result;

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
        
        return view(ViewHelper::getTemplate('pay.recharge'), $data);
    }

    public function pageback(){
        return view(ViewHelper::getTemplate('pay.pageback'));
    }

    public function queOrder(ShopRequest $shopRequest)
    {
        $params = $shopRequest->goCheck('doQueOrder');
        $orderid = $params['orderid'];
        if (!$orderid) {
            return Result::error('orderid column error!.');
        }

        $order = $this->rechargeService->getOrderByOid($orderid);
        if($order){
            return Result::success($order->toArray());
        }

        return Result::error('order is null!.');
    }
}
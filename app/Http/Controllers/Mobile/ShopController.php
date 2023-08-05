<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Lib\Result;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\ShopRequest;
use App\Services\ShopService;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    private $shopService;

    public function __construct(ShopService $shopService)
    {
       $this->shopService = $shopService;
    }

    public function index()
    {
        $data = [];
        $user = Auth::user();

        $data['user'] = $user;
        $data['bankInfo'] = $this->shopService->getBankInfoByUid($user->uid);

        return view('mobile.shop.index', $data);
    }

    public function guide()
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['banks'] = $this->shopService->getBanksByUid($data['user']->uid);
    
        return view('mobile.shop.guide', $data);
    }

    /**
     * 绑定界面
     * @return mixed
     */
    public function bind()
    {
        $data = [];
        $data['user'] = Auth::user();
        return view('mobile.shop.bind', $data);
    }

    /**
     * 处理绑定
     * @param ShopRequest $shopRequest
     * @return mixed
     */
    public function doBind(ShopRequest $shopRequest)
    {
        $params = $shopRequest->goCheck('doBind');
        $user = Auth::user();

        $this->shopService->checkDoBind($params);
        $bankInfo = $this->shopService->getBankInfoByAccount($params['account']);

        if($bankInfo && $bankInfo->uid != $user->uid) {
            return Result::error('This bank account been bound to other player.');
        } elseif($bankInfo && $bankInfo->uid == $user->uid) {
            return Result::error('This bank account you had been bound.');
        }

        $this->shopService->storeUserBank($params, $user);
        
        return Result::success();
    }

    /**
     * 提现设置
     * @return mixed
     */
    public function draw()
    {
        $data = [];
        $user = Auth::user();
        $data['user'] = $this->shopService->getDrawData($user);
        $data['banks'] = $this->shopService->getBanksByUid($user->uid);
       
        return view('mobile.shop.draw', $data);
    }
}
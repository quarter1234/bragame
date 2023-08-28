<?php

namespace App\Http\Controllers\Mobile;

use App\Cache\SconfigCache;
use App\Common\Enum\CommonEnum;
use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\ShopRequest;
use App\Services\DrawService;
use App\Services\ShopService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        return view(ViewHelper::getTemplate('shop.index'), $data);
    }

    public function guide()
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['banks'] = $this->shopService->getBanksByUid($data['user']->uid);
    
        return view(ViewHelper::getTemplate('shop.guide'), $data);
    }

    /**
     * 绑定界面
     * @return mixed
     */
    public function bind()
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['drawcom'] = $this->shopService->getFirDrawcom();
        return view(ViewHelper::getTemplate('shop.bind'), $data);
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

        // redis 锁
        $lock = Cache::add('shop:doBind:user_id_'. $user->uid. ':' . $params['account'], 1, 5);
        if (!$lock) {
            return Result::error('Pedido muito frequente.');
        }

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
       
        return view(ViewHelper::getTemplate('shop.draw'), $data);
    }

    /**
     * 提现处理
     * @param ShopRequest $shopRequest
     * @return mixed
     */
    public function doDraw(ShopRequest $shopRequest)
    {
        $params = $shopRequest->goCheck('doDraw');
        $user = Auth::user();
        $dcoin = intval($params['amount']);

        // redis 锁
        $lock = Cache::add('shop:doDraw:user_id_'. $user->uid, 1, 5);
        if (!$lock) {
            return Result::error('Pedido muito frequente.');
        }

        $userDrawLimit = $this->shopService->getDrawData($user);
        if(intval($params['amount']) < intval($userDrawLimit['mincoin'])) {
            return Result::error("Valor minimo de retirada :R$ {$userDrawLimit['mincoin']}");
        }

        if(intval($params['amount']) > intval($userDrawLimit['maxcoin'])) {
            return Result::error("Acima do valor máximo:R$ {$userDrawLimit['maxcoin']}");
        }

        if($err = $this->shopService->checkIsPlayer($user, $dcoin)) {
             return $err;
        }

        $userCoin = UserHelper::getUserCoin($user);
        if($userCoin['dcoin'] < $dcoin) {
            return Result::error('Insufficient withdrawal amount.');
        }

        $chans = $this->shopService->getChansBySvip($user['svip']);
        if(empty($chans)) {
            return Result::error('No channel Data.');
        }
        
        if($err = $this->shopService->checkLimit($user, $dcoin)) {
            return $err;
        }

        $bank = $this->shopService->getUserBankInfo($params['bankid'], $user['uid']);
        if(empty($bank)) {
            return Result::error('Please select the correct withdrawal method.');
        }

        $this->handleApplyDraw($user, $dcoin, $params['bankid']);
        return Result::success();
    }

    private function handleApplyDraw($user, $dcoin, $bankId)
    {
        $param = [
            'uid' => $user['uid'],
            'coin'=> $dcoin,
            'bankid' => $bankId,
            'chanid' => 0,
        ];

        $drawService = app()->make(DrawService::class);
        $drawService->drawApply($param);
    }
}
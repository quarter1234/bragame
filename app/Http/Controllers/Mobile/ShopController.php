<?php

namespace App\Http\Controllers\Mobile;

use App\Cache\SconfigCache;
use App\Common\Enum\CommonEnum;
use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\ShopRequest;
use App\Services\DrawService;
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

        if($err = $this->checkIsPlayer($user, $dcoin)) {
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

        if($err = $this->checkLimit($user, $dcoin)) {
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

    public function checkLimit($user, $dcoin)
    {
        $limit = $this->shopService->getLimitInfo($user['uid']);

        $todaytimes = $this->shopService->getTodayDrawTimes($user['uid']); //today max times
        if($limit['times'] >0 && $todaytimes + 1> $limit['times']) {
            return Result::error("Today's withdrawal times has reached the limit({$limit['times']})");
        }

        $todaycoin = $this->shopService->getTodayDrawCoin($user['uid']);
        if($limit['daycoin'] >0 && $todaycoin + $dcoin >= $limit['daycoin']) {
            return Result::error("Today's withdrawal amount has reached the limit({$limit['daycoin']})");
        }

        $alltimes = $this->shopService->getTodayDrawTimes($user['uid'], false); //total max times
        if($limit['totaltimes'] >0 && $alltimes + 1 > $limit['totaltimes']) {
            return Result::error("Withdrawal times has reached the limit times({$limit['totaltimes']})");
        }

        $allcoin = $this->shopService->getTodayDrawCoin($user['uid'], false);
        if($limit['totalcoin'] >0 && $allcoin + $dcoin >= $limit['totalcoin']) {
            return Result::error("Withdrawal Amount has reached the limit coin({$limit['totalcoin']})");
        }

        $lastDrawInfo = $this->shopService->getLastDrawInfo($user['uid']);
        if($lastDrawInfo && $limit['interval'] > 0 && $lastDrawInfo['create_time'] > (time() - $limit['interval']*60)) { // 间隔时间
            return Result::error('Withdrawals too frequently.');
        }
    }

    private function checkIsPlayer($user, $dcoin)
    {
        if($user['is_test'] == CommonEnum::ENABLE) { // 测试用户不能提现
            return Result::error('Usuários de teste não podem sacar.');
        }

        if(intval($user['ispayer']) == 0) { //未充值用户不能超过系统最高金额
            $cfg = SconfigCache::getByKey('newuser_no_pay_drawlimit');
            $maxcoin = intval($cfg['v']);
            $haddrawcoin = $this->shopService->getUserAllCoin($user->uid);
            
            if($maxcoin > 0 && ($dcoin + $haddrawcoin) > $maxcoin) {
                return Result::error("Withdrawal amount must be less than the maximum withdrawable amount{$maxcoin}.");
            }

            $doingcnt =  $this->shopService->getWaitDealCount($user->uid);
            if($doingcnt >= 1) {
                return Result::error('You have a withdrawal order under review, please wait patiently.');
            }
        }
    }
}
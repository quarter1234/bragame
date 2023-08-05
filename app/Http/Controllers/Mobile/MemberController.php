<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Lib\Result;
use App\Exceptions\BadRequestException;
use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\MemberRequest;
use App\Models\DUserRecharge;
use App\Repositories\SConfigCustomerRepository;
use App\Services\MemberService;
use App\Services\ShopService;
use Illuminate\Support\Facades\Auth;

/**
 * 个人中心相关
 */
class MemberController extends Controller
{
    private $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function index(ShopService $shopService)
    {
        $data = [];
        $user = Auth::user();
        
        $data['user'] =$user;
        $data['avatar'] = UserHelper::avatar($data['user']['usericon']);
        $data['bankInfo'] = $shopService->getBankInfoByUid($user->uid);

        return view('mobile.member.index', $data);
    }

    public function customerService(SConfigCustomerRepository $repo)
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['list'] = $repo->getCustomers();
        
        return view('mobile.member.customer_service', $data);
    }

    public function vip()
    {
        $user = Auth::user();

        $data = $this->memberService->getVipInfo($user);

        return view('mobile.member.vip', $data);
    }

    // 充值记录
    public function recharges()
    {
        $user = Auth::user();
        $data = [];
        $data['user'] = $user;

        return view('mobile.member.recharges', $data);
    }

    // 充值列表
    public function rechargeList()
    {
        $user = Auth::user();
        $list = $this->memberService->getRechargeList($user)->toArray();

        return view('mobile.member.rechare_list', $list);
    }

    // 提现记录
    public function draws()
    {
        $user = Auth::user();
        $data = [];
        $data['user'] = $user;

        return view('mobile.member.draws', $data);
    }

    // 提现列表
    public function drawsList()
    {
        $user = Auth::user();
        $list = $this->memberService->getDrawList($user)->toArray();
        
        return view('mobile.member.draw_list', $list);
    }

    // 投注记录
    public function bets()
    {
        $user = Auth::user();
        $data = [];
        $data['user'] = $user;

        return view('mobile.member.bets', $data);
    }

    public function betsList()
    {
        $user = Auth::user();
        $list = $this->memberService->getPgBetsList($user)->toArray();
    
        return view('mobile.member.bet_list', $list);
    }

    public function transaction()
    {
        $user = Auth::user();
        $data = [];
        $data['user'] = $user;

        return view('mobile.member.transaction', $data);
    }

    public function resetPassword()
    {
        $user = Auth::user();
        $data = [];
        $data['user'] = $user;

        return view('mobile.member.reset_password', $data);
    }

    public function doChangePassword(MemberRequest $memberRequest)
    {
        $params = $memberRequest->goCheck('doChangePassword');
        $user = Auth::user();

        $credentials = [];
        $credentials['phone'] = $user['phone'];
        $credentials['password'] = $params['oldPassword'];

        if (!auth()->attempt($credentials)) {
            throw new BadRequestException(['msg' => 'A senha antiga foi inserida incorretamente.']);
        } 

        $userInfo = UserHelper::getUserByUid($user->uid);
        $userInfo->password = bcrypt(trim($params['newPassword']));
        $userInfo->save();

        Auth::login($userInfo, true);
        return Result::success();
    }
}
<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Repositories\SConfigCustomerRepository;
use App\Services\MemberService;
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

    public function index()
    {
        $data = [];
        $data['user'] = Auth::user();
        $data['avatar'] = UserHelper::avatar($data['user']['usericon']);
        return view('mobile.member.index', $data);
    }

    public function setting()
    {
        $data = [];
        $data['user'] = Auth::user();
        return view('mobile.member.setting', $data);
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

    public function rechargeList()
    {
        $user = Auth::user();
        $list = $this->memberService->getRechargeList($user)->toArray();

        return view('mobile.member.rechare_list', $list);
    }

    // 提现记录
    public function draws()
    {
        return view('mobile.member.draws');
    }

    // 投注记录
    public function bets()
    {
        return view('mobile.member.bets');
    }
}
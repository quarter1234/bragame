<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\DUserRecharge;
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
        // print_r($list);die();
        return view('mobile.member.bet_list', $list);
    }
}
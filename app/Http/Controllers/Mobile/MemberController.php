<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;

/**
 * 个人中心相关
 */
class MemberController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
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

    public function customerService()
    {
        return view('mobile.member.customer_service');
    }

    public function vip()
    {
        return view('mobile.member.vip');
    }

    public function email()
    {
        return view('mobile.member.email');
    }
}
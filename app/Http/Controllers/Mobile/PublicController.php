<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Enum\CommonEnum;
use App\Common\Lib\Result;
use App\Events\RegisterEvent;
use App\Exceptions\BadRequestException;
use App\Helper\UserHelper;
use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PublicRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as ReqeustSession;
use Illuminate\Support\Facades\Redis;

class PublicController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * 注册页面
     * @return mixed
     */
    public function register()
    {
        if (Auth::check()) {
            return redirect('/mobile/index');
        }

        return view(ViewHelper::getTemplate('public.register'));
    }

    /**
     * 注册处理
     * @param PublicRequest $request
     * @return mixed
     */
    public function doRegister(PublicRequest $request)
    {
        $params = $request->goCheck('doRegister');
        $params['ip'] = Request::getClientIp();

        $maxRegIpNum = Redis::get('same_ip_reg_maxnum');
        $regIpTotal = $this->userService->getRegIpNum($params['ip']);
        // 注册IP限制
        if(intval($maxRegIpNum) > 0 && $regIpTotal > intval($maxRegIpNum)) {
            return Result::error('Limite máximo de contas registradas.');
        }

        $hasUser = $this->userService->getUserByPhone($params['phone']);
        if($hasUser) {
            return Result::error(trans('auth.phone_used'));
        }

        $registerUser =$this->userService->storeUser($params);
        if(!$registerUser) {
            return Result::error(trans('auth.register_err'));
        }

        $inviteCode = session(CommonEnum::INVITE_CODE_KEY);
        event(new RegisterEvent($registerUser, $inviteCode));

        $user = UserHelper::getUserByUid($registerUser->uid);
        Auth::login($user, true);
        $this->userService->storeLoginLog($user, $params);

        return Result::success();
    }

    /**
     * 登录页面
     * @return mixed
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect('/mobile/index');
        }

        return view(ViewHelper::getTemplate('public.login'));
    }

    /**
     * 登录处理
     * @param PublicRequest $request
     * @return mixed
     */
    public function doLogin(PublicRequest $request, ReqeustSession $sessionRequest)
    {
        $params = $request->goCheck('doLogin');
        $params['ip'] = Request::getClientIp();

        if(!$this->handleLogin($params, $sessionRequest)) {
            return Result::error(trans('auth.failed'));
        }

        return Result::success();
    }

    /**
     * 处理登录
     * @param array $params
     * @return bool
     */
    private function handleLogin($params, $sessionRequest) :bool
    {
        $credentials = [];
        $credentials['phone'] = $params['phone'];
        $credentials['password'] = $params['password'];

        if (!auth()->attempt($credentials, true)) {
            return false;
        } 

        $user = Auth::user();
        if($user['status'] != CommonEnum::ENABLE) {
            $sessionRequest->session()->flush();
            Auth::logout();
            throw new BadRequestException(['msg' => trans('auth.account_exception')]);
        }

        Auth::logoutOtherDevices($params['password']); 

        $this->userService->storeLoginLog($user, $params);
        return true;
    }

    /**
     * 登出操作
     * @return mixed
     */
    public function logout(ReqeustSession $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect('/mobile/index');
    }
}
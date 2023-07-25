<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Enum\CommonEnum;
use App\Common\Lib\Result;
use App\Events\RegisterEvent;
use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PublicRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        return view('mobile.public.register');
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
       
        if(!$this->handleLogin($params)) {
            return Result::error(trans('auth.failed'));
        }

        return Result::success();
    }

    /**
     * 处理登录
     * @param array $params
     * @return bool
     */
    private function handleLogin($params) :bool
    {
        $credentials = [];
        $credentials['phone'] = $params['phone'];
        $credentials['password'] = $params['password'];

        
        if (!auth()->attempt($credentials, true)) {
            return false;
        } 
        Auth::logoutOtherDevices($params['password']); 
        $user = Auth::user();
        if($user['status'] != CommonEnum::ENABLE) {
            throw new BadRequestException(['msg' => trans('auth.account_exception')]);
            
        }

        $this->userService->storeLoginLog($user, $params);
        
        return true;
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

        return view('mobile.public.login');
    }

    /**
     * 登录处理
     * @param PublicRequest $request
     * @return mixed
     */
    public function doLogin(PublicRequest $request)
    {
        $params = $request->goCheck('doLogin');
        $params['ip'] = Request::getClientIp();

        if(!$this->handleLogin($params)) {
            return Result::error(trans('auth.failed'));
        }

        return Result::success();
    }

    /**
     * 登出操作
     * @return mixed
     */
    public function logout()
    {
        auth()->logout();
        Auth::logoutCurrentDevice();
        return redirect('/mobile/index');
    }
}
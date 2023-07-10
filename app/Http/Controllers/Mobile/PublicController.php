<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PublicRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

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
            return Result::error('这个手机号已经被使用');
        }

        $res =$this->userService->storeUser($params);
        if(!$res) {
            return Result::error('注册失败');
        }
        
        if(!$this->handleLogin($params)) {
            return Result::error('数据库或密码不正确！');
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
        
        if (!auth()->attempt($credentials)) {
            return false;
        } 

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
            return Result::error('数据库或密码不正确！');
        }

        $user = Auth::user();
        $this->userService->storeLoginLog($user, $params);

        return Result::success();
    }
}
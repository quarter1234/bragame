<?php

namespace App\Http\Controllers;

use App\Common\Lib\Result;
use App\Http\Requests\UserRequest;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\Response;
use App\Common\Enum\ResponseCode;
use App\Exceptions\AuthorizeException;
use App\Exceptions\BadRequestException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

/**
 * 暂时无用
 */
class AuthController extends Controller
{
    public $loginAfterSignUp = true;
    private $authService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
        $this->middleware('auth:api', ['except' => ['login', 'register', 'wxLogin', 'wxPhone', 'noAuth']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['mobile', 'password']);
        
        if (!$token = auth()->attempt($credentials)) {
            return Result::error('Unauthorized!', ResponseCode::CLIENT_PARAMETER_ERROR, Response::HTTP_UNAUTHORIZED);
        }

        $user = auth()->user()->toArray();
        $user['token'] = $token;
        return Result::success($user);
    }

    public function noAuth()
    {
        throw new AuthorizeException(['msg' => 'No Auth!!']);
    }

    /**
     * login
     * 小程序端用户登录
     *
     * @queryParam access_token string optional 登录令牌(如果提供并有效，则不会像微信发起请求). Example: b6b89664-392b-4836-a54d-0b785566420a
     * @queryParam code string optional wx.login获得的code
     * @return array
     * @throws \Exception
     */
    public function wxLogin(UserRequest $request)
    {
        $params = $request->goCheck('wxLogin');
        $user = $this->authService->handleWxLoginUser($params['code'], $params);
        
        if ($user['status'] != 1) {
            throw new BadRequestException(['msg' => '当前用户状态已屏蔽，请联系管理员！']);
        }
        $user['roles'] = $user->getRoleNames();
        
        // 发送登录事件
        // event(new UserLogged($user));
        $token = Auth::login($user);
        // $this->authService->storeToken($user['id'], $token);
        $user['token'] = $token;
        return $user;
    }

    /**
     * 获取微信手机号
     * @param UserRequest $request
     * @param UserRepository $userRepository
     * @return void
     */
    public function wxPhone(UserRequest $request, UserRepository $userRepository)
    {
        $params = $request->goCheck('wxPhone');
        $app = getMiniProgram();
        
        $info = $app->phone_number->getUserPhoneNumber($params['code']);
        
        if($info && isset($info['errcode']) && $info['errcode'] == 0 && isset($info['phone_info']['phoneNumber'])) {
            $user = $userRepository->getUserInfoByOpenid($params['open_id']);

            if($user) {
                $user->mobile = $info['phone_info']['phoneNumber'];
                $user->save();
            }
        } else {
            throw new BadRequestException(['msg' => '获取电话号码失败！']);
        }

        $token = Auth::login($user);
        $user['token'] = $token;
        $user['roles'] = $user->getRoleNames();
        return Result::success($user);
    }



    /**
     * 用户注册
     * @param UserRequest $request
     * @return void
     */
    public function register(UserRequest $request)
    {
        $data = $request->goCheck('register');
        $data['password'] = bcrypt($data['password']);
        $data['uuid'] = createId();
        $user = $this->authService->storeUser($data);
        $user->syncRoles(['tourist']);
        $user['roles'] = $user->getRoleNames();
        
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return Result::success(['success' => true,'data' => $user]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return Result::success(auth()->user());
    }

    /**
     * 更新用户信息
     * @param UserRequest $request
     * @return mixed
     */
    public function updateMe(UserRequest $request)
    {
        $data = $request->goCheck('updateMe');
        $user = Auth::user();
        $user = $this->authService->updateUser($data, $user->id);

        $token = Auth::login($user);
        $user['token'] = $token;

        return Result::success($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return Result::success(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     * 刷新token，如果开启黑名单，以前的token便会失效。
     * 值得注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return Result::success([
            'token' => $token,
            // 'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 36000
        ]);
    }
}

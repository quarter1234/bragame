<?php
namespace App\Services;

use App\Exceptions\BadRequestException;
use App\Repositories\TokenRepository;
use App\Repositories\UserRepository;

class AuthService
{
    private $userRepository;
    private $tokenRepo;

    public function __construct(UserRepository $userRepository, TokenRepository $tokenRepo)
    {
        $this->userRepository  = $userRepository;
        $this->tokenRepo = $tokenRepo;
    }

    public function storeUser($data)
    {
        return $this->userRepository->create($data);
    }

    public function updateUser($data, $userId)
    {
        return $this->userRepository->update($data, $userId);
    }

    public function handleWxLoginUser($code, $params)
    {
        try {
            $app = getMiniProgram();
            $ret = $app->auth->session($code);
            if (!isset($ret['openid'])) {
                throw new BadRequestException(['msg' => '登录失败:' . $ret['errmsg']]);
            }
            
            $user = $this->userRepository->getUserInfoByOpenid($ret['openid']);
            
            if(!$user) {
                $city = ip2city(request()->getClientIp());
                $data = [
                    'uuid' => createId(),
                    'unionid' => $ret['unionid'] ?? '',
                    'open_id' => $ret['openid'],
                    'nickname' => '微信用户-' .substr($ret['openid'], 0, 3),
                    'avatar' => 'https://thirdwx.qlogo.cn/mmopen/vi_32/POgEwh4mIHO4nibH0KlMECNjjGxQUq24ZEaGT4poC6icRiccVGKSyXwibcPq4BWmiaIGuG1icwxaQX6grC9VemZoJ8rg/132',
                    'province' => $city['province_id'],
                    'city' => $city['city_id'],
                    'status' => 1,
                ];
                
                $user = $this->userRepository->create($data);
                $user->syncRoles(['tourist']);
            }       
        } catch (\Throwable $th) {
            throw $th;
        }
        
        return $user;
    }

    public function storeToken($userId, $token)
    {
        $data = [
            'user_id' => $userId,
            'token'   => $token
        ];

        $this->tokenRepo->create($data);
    }
}
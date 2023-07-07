<?php
namespace App\Services;

use App\Models\DUserLoginLog;
use App\Repositories\UserRepository;

class UserService
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo  = $userRepo;
    }

    /**
     * 获取用户信息
     * @param  $phone
     * @return mixed
     */
    public function getUserByPhone($phone)
    {
        return $this->userRepo->getUserByPhone($phone);
    }

    /**
     * 创建用户
     * @param array $params
     * @return mixed
     */
    public function storeUser(array $params)
    {
        $data = [];
        $data['phone'] = $params['phone'];
        $data['password'] = bcrypt(trim($params['password']));
        $data['playername'] = $params['playername'];
        $data['usericon'] = rand(1,11);
        $data['reg_ip'] = $params['ip'];
        $data['login_time'] = time();
        $data['login_ip'] = $params['ip'];

        return $this->userRepo->storeUser($data);
    }

    public function storeLoginLog($user, $params)
    {
        $data = [];
        $data['uid'] = $user['uid'];
        $data['login_type'] = 1;
        $data['create_time'] = time();
        $data['channel'] = 'android';
        $data['apkversion'] = '';
        $data['resversion'] = '';
        $data['login_level'] = 0;
        $data['login_coin'] = $user['coin'] ?? 0;
        $data['ip'] = $params['ip'];
        $data['resversion'] = '';
        $data['login_ip'] = $params['ip'];

        DUserLoginLog::create($data);
    }
}
<?php

namespace App\Http\Controllers\Home;

use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\UserRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        // $this->middleware('auth:api'); 
        $this->userService = $userService;
    }

    public function show($uuid, UserRepository $userRepo)
    {
        return $userRepo->getUserInfoByUuid($uuid);
    }

    public function manageList(UserRequest $request)
    {
        $params = $request->goCheck('manageList');
        return $this->userService->getUsers($params);
    }

    public function userInfo($uuid, UserRepository $userRepo)
    {
        $user = $userRepo->getUserInfoByUuid($uuid);
        $user['roles'] = $user->getRoleNames()->toArray();
        
        $user['role_id'] = $this->userService->getRoleId($user['roles']);
       
        return $user;
    }

    public function updateUserInfo(UserRequest $request, UserRepository $userRepo)
    {
        $params = $request->goCheck('updateUserInfo');
        $user = $userRepo->getUserInfoByUuid($params['uuid']);
        if(!$user) {
            throw new BadRequestException(['msg' => '没找到对应用户信息']);
        }

        $roleInfo = $this->userService->getRoleInfo($params['role']);
        if(!$roleInfo) {
            throw new BadRequestException(['msg' => '没找到对应的角色信息']);
        }

        $user->syncRoles([$roleInfo->name]);
        $user->status = $params['status'];
        $user->save();

        return $user;
    }
}
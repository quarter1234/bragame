<?php
namespace App\Services;

use App\Exceptions\BadRequestException;
use App\Exceptions\PermissionNotExistException;
use App\Exceptions\RoleNotExistException;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

class PermissionService
{
    private $roleRepo;
    private $permissionRepo;
    private $userRepo;

    public function __construct(RoleRepository $roleRepo, PermissionRepository $permissionRepo, UserRepository $userRepo)
    {
        $this->roleRepo  = $roleRepo;
        $this->permissionRepo = $permissionRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * 存储角色
     * @param array $params
     * @return void
     */
    public function storeRole($params)
    {
        try {
            $this->roleRepo->store($params);
        } catch (\Throwable $th) {
            throw new BadRequestException(['msg' => '创建角色失败']);
        }
    }

    /**
     * 存储权限
     * @param array $params
     * @return void
     */
    public function storePermission($params)
    {
        try {
            $this->permissionRepo->store($params);
        } catch (\Throwable $th) {
            throw new BadRequestException(['msg' => '创建权限失败']);
        }
    }
    
    public function roleSyncPermissions($roleName, array $permissions)
    {
        $role = $this->roleRepo->findByName($roleName);

        try {
            $role->syncPermissions($permissions);
        } catch (\Throwable $th) {
            throw new PermissionNotExistException(['msg' => '角色创建权限失败']);
        }
    }

    public function syncUserRoles($userId, array $roles)
    {
        $user = $this->userRepo->find($userId);

        try {
            $user->syncRoles($roles);
        } catch (\Throwable $th) {
            throw new RoleNotExistException(['msg' => '角色赋值失败']);
        }
    }
}
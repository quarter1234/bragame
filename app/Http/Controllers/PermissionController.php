<?php

namespace App\Http\Controllers;

use App\Common\Lib\Result;
use App\Http\Requests\PermissionRequest;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    public $loginAfterSignUp = true;
    private $roleService;

    public function __construct(PermissionService $roleService)
    {
        $this->roleService = $roleService;
        $this->middleware('auth:api');
    }

    /**
     * 创建角色
     * @param PermissionRequest $request
     * @return mixed
     */
    public function storeRole(PermissionRequest $request)
    {
        $params = $request->goCheck('storeRole');
        $this->roleService->storeRole($params);

        return Result::success();
    }

    /**
     * 创建权限
     * @param PermissionRequest $request
     * @return mixed
     */
    public function storePermission(PermissionRequest $request)
    {
        $params = $request->goCheck('storePermission');
        $this->roleService->storePermission($params);

        return Result::success();
    }

    /**
     * 角色赋权限
     * @param PermissionRequest $request
     * @return mixed
     */
    public function syncRolePermissions(PermissionRequest $request)
    {
        $params = $request->goCheck('syncRolePermissions');

        $this->roleService->roleSyncPermissions($params['role_name'], $params['permissions']);

        return Result::success();
    }

    public function syncUserRoles(PermissionRequest $request)
    {
        $params = $request->goCheck('syncUserRoles');
        $this->roleService->syncUserRoles($params['user_id'], $params['roles']);
        return Result::success();
    }

}
<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class PermissionRequest extends BaseRequest
{
    public function storeRole()
    {
        return [
            'name' => 'required|string|max:120',
            'display_name' => 'required|string|max:120',
        ];
    }

    public function storePermission()
    {
        return [
            'name' => 'required|string|max:120',
            'display_name' => 'required|string|max:120',
        ];
    }

    public function syncUserRoles()
    {
        return [
            'user_id' => 'required|int',
            'roles' => 'required|array|max:10',
        ];
    }

    public function syncRolePermissions()
    {
        return [
            'role_name' => 'required|string|max:120',
            'permissions' => 'required|array|max:10',
        ];
    }
}
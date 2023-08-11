<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\BaseRequest;

class UserRequest extends BaseRequest
{
    public function manageList()
    {
        return [
            'search_key' => 'string|max:32',
            'page' => 'required|numeric'
        ];
    }

    public function updateUserInfo()
    {
        return [
            'status' => 'required|numeric|in:-1,1',
            'role' => 'required|numeric',
            'uuid' => 'required|string|max:33'
        ];
    }
}
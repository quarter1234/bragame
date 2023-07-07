<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class UserRequest extends BaseRequest
{
    public function register()
    {
        return [
            'name' => 'required|string|min:2|max:102',
            'mobile' => 'required|string|unique:users|min:7|max:15',
            'password' => 'required|string|min:6|max:10'
        ];
    }

    public function updateMe()
    {

        return [
            'name' => 'required|string|min:2|max:102',
            'mobile' => 'required|string|min:7|max:15',
            'nickname' => 'required|string|min:2|max:102',
            'avatar' => 'required|string|min:6|max:255'
        ];
    }

    protected function getAttributes()
    {
        return [
            'mobile' => 'mobile', 
            'password' => '密码'
        ];
    }

    public function wxLogin()
    {
        return [
            'code' => 'required|string|max:120',
            // 'avatar' => 'nullable|string|max:320',
            // 'nickname' => 'nullable|string|max:200'
        ];
    }

    public function wxPhone()
    {
        return [
            'open_id' => 'required|string|max:64',
            'code' => 'required|string|max:120',
        ];
    }
}
<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\BaseRequest;

class PublicRequest extends BaseRequest
{
    public function doRegister()
    {
        return [
            'playername' => 'required | string | max:32',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|max:32',
        ];
    }

    public function doLogin()
    {
        return [
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|max:32',
        ];
    }

    public function index()
    {
        return [
            'code' => 'max:9',
            'showLogin' => 'in:0,1',
        ];
    }

    // public function getAttributes()
    // {
    //     return [
    //         'same' => 'The :attribute and :other must match.',
    //         'size' => 'The :attribute must be exactly :size.',
    //         'between' => 'The :attribute value :input is not between :min - :max.',
    //         'in' => 'The :attribute must be one of the following types: :values',
    //     ];
    // }

}
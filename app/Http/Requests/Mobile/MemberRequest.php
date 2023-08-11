<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\BaseRequest;

class MemberRequest extends BaseRequest
{
    public function doChangePassword()
    {
        return [
            'newPassword' => 'required|string|min:6|max:132',
            'oldPassword' => 'required|string|min:6 | max:132',
        ];
    }
}
<?php

namespace App\Http\Requests\Inner;

use App\Http\Requests\BaseRequest;

class DrawRequest extends BaseRequest
{
    public function drawApply()
    {
        return [
            'uid' => 'required|integer|min:1',
            'coin' => 'required|numeric|min:1',
            'bankid' => 'required|integer|min:1',
            'chanid' => 'required|integer',
        ];
    }
}
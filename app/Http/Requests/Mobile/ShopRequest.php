<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\BaseRequest;

class ShopRequest extends BaseRequest
{
    public function doBind()
    {
        return [
            'pix_type' => 'required |numeric|in:1,2,3,4',
            'account' => 'required|string|max:64',
            'reaccount' => 'required|string|max:64',
            'username' => 'required|string|min:2|max:132',
            'id_card' => 'string|max:14',
        ];
    }

    public function doDraw()
    {
        return [
            'amount' => 'required |integer|min:1',
            'bankid' => 'required|integer|min:1',
        ];
    }
}
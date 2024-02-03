<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\BaseRequest;

class DisplayRequest extends BaseRequest
{
    public function display()
    {
        return [
            'act' => 'required | string |in:pay,game_url,kyc,transaction,payment,draw,post_pay,tada_game_url,pgpro_game_url',
            'game_code' => 'string | max:64',
            'id' => 'numeric',
            'amount' => 'numeric'
        ];
    }

}

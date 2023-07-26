<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\BaseRequest;

class DisplayRequest extends BaseRequest
{
    public function display()
    {
        return [
            'act' => 'required | string |in:pay,game_url,kyc,transaction,payment,draw',
            'game_code' => 'string | max:64'
            
        ];
    }

}

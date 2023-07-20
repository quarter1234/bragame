<?php
namespace App\Http\Controllers\ManCallBack;

use App\Common\Enum\GameEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\User;

class CallApiController extends Controller{
    /**
     * --支付回调
     * @param Request $request
     */
    public function processRequestPay(Request $request){
        $mod = $request->get("mod", '');
        $act = $request->get("act", '');
        $orderid = $request->get("orderid", '');
        if($mod != 'pay' || $act != 'callback'){
            return 'error';
        }

        if(empty($orderid)){
            return 'error';
        }

        $resVal = User::orderAsynCallback($orderid);
        if(GameEnum::PDEFINE['RET']['SUCCESS'] == $resVal){
            return 'succ';
        }

        return 'error';
    }
}

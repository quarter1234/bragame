<?php
namespace App\Http\Controllers\ManCallBack;

use App\Common\Enum\GameEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\User;

class CallApiController extends Controller{
    public function index(Request $request){
        $mod = $request->get("mod", '');
        if($mod == "coin"){ // 后台上下分
            return $this->processRequestCoin($request);
        }
        else if($mod == "pay"){ // 支付回调
            return $this->processRequestPay($request);
        }
        else if($mod == "user"){
            return $this->processRequestUser($request);
        }

        return 'error';
    }



    /**
     * --支付回调和手动到账
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

    /**
     * 用户相关的操作(针对后台调用)
     * @param Request $request
     * @return string
     */
    public function processRequestUser(Request $request){
        $mod = $request->get("mod", '');
        $act = $request->get("act", '');
        if($mod != 'user'){
            return 'error';
        }

        if($act == 'drawverify'){ // 提现审核
            $uid = $request->get("uid", false);
            $id = $request->get("id", false);
            $status = $request->get("status", false);
            if(!$uid || !$id || !$status){
                return "has some column empty";
            }

            $resVal = User::drawverify($uid, $id, $status);
            if(GameEnum::PDEFINE['RET']['SUCCESS'] == $resVal){
                return 'succ';
            }
        }

        return 'error';
    }

    /**
     * 后台上下分
     * @param Request $request
     * @return string
     */
    public function processRequestCoin(Request $request){
        $mod = $request->get("mod", false);
        $act = $request->get("act", false);
        $uid = $request->get("uid", false);
        $coin = $request->get("coin", false);
        if($mod != 'coin' || $act != 'add' || !$uid || !$coin){
            return 'error';
        }

        $resVal = User::apiAddCoin($uid, $coin);
        if(GameEnum::PDEFINE['RET']['SUCCESS'] == $resVal){
            return 'succ';
        }

        return 'error';
    }
}

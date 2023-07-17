<?php
namespace App\Http\Controllers\ManCallBack;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Common\Lib\Result;
use App\Http\Controllers\Controller;

class CallApiController extends Controller{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * --支付回调
     * @param Request $request
     */
    public function processRequestPay(Request $request){
        $mod = $request->get("mod", '');
        $act = $request->get("callback", '');
        $orderid = $request->get("orderid", '');
        if($mod != 'pay' || $act != 'callback'){
            return Result::error('mod or act error');
        }

        if(empty($orderid)){
            return Result::error('not find orderid');
        }

        $resVal = $this->userService->orderAsynCallback($orderid);

        return Result::success();
    }
}

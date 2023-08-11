<?php

namespace App\Http\Controllers\Inner;

use App\Common\Enum\HttpCodeEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Services\GameService;
use Illuminate\Support\Facades\Log;

class JiliController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function jiliCallBackAuth(){
        $uid = intval(Request::post('uid', 0));
        if(empty($uid)){
            $this->gameService->jiliRespData['errorCode'] = $this->gameService->jiliErrorCode['INV_PARAM'];
            $this->gameService->jiliRespData['message'] = "request column is error!";
            return Result::json($this->gameService->jiliRespData);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            $this->gameService->jiliRespData['errorCode'] = $this->gameService->jiliErrorCode['OTHER_ERROR'];
            $this->gameService->jiliRespData['message'] = "not find user!";
            return Result::json($this->gameService->jiliRespData);
        }

        $respData = $this->gameService->getUserJiliBalance($uid, $user);
        return Result::json($respData);
    }

    public function jiliCallBackBet(){
        $uid = intval(Request::post('uid', 0));
        $params = Request::post();
        Log::debug("jiliCallBackBet-params:" . json_encode($params));

        if(empty($params)){
            $this->gameService->jiliRespData['errorCode'] = $this->gameService->jiliErrorCode['INV_PARAM'];
            $this->gameService->jiliRespData['message'] = "request column is error!";
            return Result::json($this->gameService->jiliRespData);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            $this->gameService->jiliRespData['errorCode'] = $this->gameService->jiliErrorCode['OTHER_ERROR'];
            $this->gameService->jiliRespData['message'] = "not find user!";
            return Result::json($this->gameService->jiliRespData);
        }

        // 第三方游戏的投注和赢分
        $respData = $this->gameService->jiliBetResult($user, $params);
        return Result::json($respData);
    }
}

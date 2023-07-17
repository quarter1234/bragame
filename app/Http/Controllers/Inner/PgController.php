<?php

namespace App\Http\Controllers\Inner;

use App\Common\Enum\HttpCodeEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Services\GameService;

class PgController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * 验证获得用户余额
     * @return \Illuminate\Http\JsonResponse
     */
    public function callBackAuth(){
        $uid = intval(Request::post('uid', 0));
        if(empty($uid)){
            $this->gameService->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return Result::json($this->gameService->defauRespData, HttpCodeEnum::UNAUTHORIZED);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            $this->gameService->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return Result::json($this->gameService->defauRespData, HttpCodeEnum::UNAUTHORIZED);
        }

        $respData = $this->gameService->getUserBalance($uid, $user);
        return Result::json($respData);
    }

    /**
     *  投注和赢分
     * @return \Illuminate\Http\JsonResponse
     */
    public function callBackBet(){
        $uid = intval(Request::post('uid', 0));
        $params = Request::post();

        if(empty($params)){
            $this->gameService->defauRespData['status'] = 'SC_INVALID_REQUEST';
            return Result::json($this->gameService->defauRespData, HttpCodeEnum::UNAUTHORIZED);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            $this->gameService->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return Result::json($this->gameService->defauRespData, HttpCodeEnum::UNAUTHORIZED);
        }

        // 第三方游戏的投注和赢分
        $respData = $this->gameService->pgBetResult($user, $params);
        return Result::json($respData);
    }
}
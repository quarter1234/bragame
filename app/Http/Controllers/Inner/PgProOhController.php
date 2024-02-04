<?php

namespace App\Http\Controllers\Inner;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Services\GameService;

// 第三方假PG
class PgProOhController extends Controller{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function callBackAuth(){
        $uid = intval(Request::post('uid', 0));
        if(empty($uid)){
            $this->gameService->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return Result::json($this->gameService->defauRespData);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            $this->gameService->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return Result::json($this->gameService->defauRespData);
        }

        $respData = $this->gameService->getUserBalance($uid, $user);
        return Result::json($respData);
    }

    public function callBackBet(){
        $uid = intval(Request::post('uid', 0));
        $params = Request::post();
        if(empty($params)){
            $this->gameService->defauRespData['status'] = 'SC_INVALID_REQUEST';
            return Result::json($this->gameService->defauRespData);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            $this->gameService->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return Result::json($this->gameService->defauRespData);
        }
        // 第三方游戏的投注和赢分
        $respData = $this->gameService->pgproOhBetResult($user, $params);
        return Result::json($respData);
    }
}
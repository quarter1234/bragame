<?php

namespace App\Http\Controllers\Inner;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Helper\UserHelper;
use App\Common\Lib\Result;
use App\Services\GameService;
use Illuminate\Support\Facades\Log;
class PgProController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }
    public function getUserBlance(Request $request){
        $userIdStr = Request::post('user_id', false);
        if(!$userIdStr){
            return Result::error('not find columns!');
        }

        $user = UserHelper::getUserByPgPro($userIdStr);
        if(!$user){
            return Result::error('not find user!');
        }

        return Result::success(['user_blance' => $user['coin']]);
    }

    public function lottCallBack(){
        $userIdStr = Request::post('user_id', false);
        if(!$userIdStr){
            return Result::error('not find user_id column!');
        }

        $params = Request::post();
        Log::debug("pgpro-CallBack-params:" . json_encode($params));
        if(empty($params)){
            return Result::error('not find columns!');
        }

        $user = UserHelper::getUserByPgPro($userIdStr);
        if(!$user){
            return Result::error('not find user!');
        }

         // 第三方游戏的投注和赢分
         $respData = $this->gameService->pgproBetResult($user, $params);
         return Result::success($respData);
    }
}
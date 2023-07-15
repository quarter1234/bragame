<?php

namespace App\Http\Controllers\Game;

use App\Common\Enum\ResponseCode;
use App\Common\Lib\Result;
use App\Helper\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class GameController extends Controller
{
    private $gameService;
    private $defauRespData = [
        "status" => "SC_OK",
        "data" => [
            "username" => "",
            "balance" => 0,
        ]
    ];

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function getPgs()
    {
        $params = [];
        $params['platform'] = 'PGS';
        $res = $this->gameService->getPGGames($params);

        return Result::success($res);
    }

    public function getPps()
    {
        $params = [];
        $params['platform'] = 'PP';
        $res = $this->gameService->getPGGames($params);

        return Result::success($res);
    }

    /**
     * 获取游戏地址
     * @return mixed
     */
    public function getPgUrl()
    {
        $id = intval(Request::get('id', 0));
        $gameInfo = $this->gameService->getDPGGameInfo($id);
        if(!$gameInfo) {
            return Result::error('not find game');
        }

        $uid = intval(Request::get('uid', 0));
        if(empty($uid)){
            return Result::error('uid not exist', ResponseCode::AUTH_ERROR);
        }
        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            return Result::error('user is empty', ResponseCode::AUTH_ERROR);
        }
        $res = $this->gameService->getPgGameUrl($gameInfo['game_code'], $user);
        if(isset($res['code']) && $res['code'] === 0) {
            return Result::success(['url' => $res['data']['url']]);
        }

        return Result::error('Get Game Url Err');
    }

    /**
     * 验证获得用户余额
     * @return \Illuminate\Http\JsonResponse
     */
    public function callBackAuth(){
        if (!Auth::check()) {
            return Result::error('No Auth!!', ResponseCode::AUTH_ERROR);
        }
        $uid = intval(Request::get('uid', 0));
        if(empty($uid)){
            return Result::error('uid not exist', ResponseCode::AUTH_ERROR);
        }
        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            return Result::error('user is empty', ResponseCode::AUTH_ERROR);
        }
        $respData = $this->gameService->getUserBalance($uid, $user);
        return Result::success($respData);
    }

    /**
     *  投注和赢分
     * @return \Illuminate\Http\JsonResponse
     */
    public function callBackBet(){
        $uid = intval(Request::post('uid', 0));
        $params = Request::post();
        if(empty($params)){
            return Result::error('not post data', ResponseCode::AUTH_ERROR);
        }

        $user = UserHelper::getUserByUid($uid);
        if(empty($user)){
            if(empty($params)){
                return Result::error('user is empty', ResponseCode::AUTH_ERROR);
            }
        }
        // 第三方游戏的投注和赢分
        $respData = $this->gameService->pgBetResult($user, $params);
        return Result::success($respData);
    }
}

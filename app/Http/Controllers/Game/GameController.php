<?php

namespace App\Http\Controllers\Game;

use App\Common\Enum\ResponseCode;
use App\Common\Lib\Result;
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
        if (!Auth::check()) {
            return Result::error('No Auth!!', ResponseCode::AUTH_ERROR);
        }

        $id = intval(Request::get('id', 0));
        $gameInfo = $this->gameService->getDPGGameInfo($id);
        if(!$gameInfo) {
            return Result::error('not find game');
        }

        $user = Auth::user();
        $res = $this->gameService->getPgGameUrl($gameInfo['game_code'], $user);
        if(isset($res['code']) && $res['code'] === 0) {
            return Result::success(['url' => $res['data']['url']]);
        }

        return Result::error('Get Game Url Err');
    }

    public function callBackAuth(){
        $uid = intval(Request::get('uid', 0));
        if(empty($uid)){
            $this->defauRespData['status'] = "SC_WRONG_PARAMETERS";
            return Result::json($this->defauRespData);
        }

        $user = Auth::user();
        if(empty($user)){
            $this->defauRespData['status'] = "SC_USER_NOT_EXISTS";
            return Result::json($this->defauRespData);
        }

        $this->defauRespData['data']['balance'] = $user['coin'];
        $this->defauRespData['data']['username'] = $uid;
        return Result::json($this->defauRespData);
    }
}

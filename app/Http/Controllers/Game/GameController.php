<?php

namespace App\Http\Controllers\Game;

use App\Common\Lib\Result;
use App\Events\UserGameEvent;
use App\Http\Controllers\Controller;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class GameController extends Controller
{
    private $gameService;

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

        $user = Auth::user();
        $params = [];
        $params['ip'] = Request::getClientIp();
        $params['game_id'] = $gameInfo['id'];
        
        event(new UserGameEvent($user, $params));

        if($user->coin < $gameInfo->en_coin) {
            return Result::error("Menos de {$gameInfo['en_coin']} moedas");
        }

        return Result::success(['code' => $gameInfo['game_code'] ?? '']);
    } 
}

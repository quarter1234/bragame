<?php

namespace App\Http\Controllers\Game;

use App\Common\Lib\Result;
use App\Events\UserGameEvent;
use App\Http\Controllers\Controller;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Common\Enum\CommonEnum;
use App\Helper\SystemConfigHelper;

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
        $res = false;
        $pgstatus = SystemConfigHelper::getByKey('pgstatus');
        if(!$pgstatus){ //0=真PG 1=假PG
            $res = $this->gameService->getPGGames($params);
        }else{
            if (Auth::check()) {
                $user = Auth::user();
                if($user && $user['is_test'] == 1){ // 测试号使用的真PG
                    $res = $this->gameService->getPGGames($params);
                }
            }
            
            if(!$res){
                $res = $this->gameService->getPGGamestc($params);
            }
            
        }
        return Result::success($res);
    }

    public function getPps()
    {
        $params = [];
        $params['platform'] = 'PP';
        $res = $this->gameService->getPGGames($params);

        return Result::success($res);
    }

    public function getJls()
    {
        $params = [];
        $params['platform'] = 'JL';
        $res = $this->gameService->getPGGames($params);

        return Result::success($res);
    }

    public function getTadas()
    {
        $res = $this->gameService->getTadaGames();
        return Result::success($res);
    }

    public function getPgPros()
    {
        $pgstatus = SystemConfigHelper::getByKey('pgstatus');
        $res = false;
        if(!$pgstatus){ //0=真PG 1=假PG
            $params = [];
            $params['platform'] = 'PGS';
            $res['data'] = $this->gameService->getPGGameslimit($params);
            return Result::success($res);
        }

        if (Auth::check()) {
            $user = Auth::user();
            if($user && $user['is_test'] == 1){ // 测试号使用的真PG
                $params = [];
                $params['platform'] = 'PGS';
                $res['data'] = $this->gameService->getPGGameslimit($params);
            }
        }
       
        if(!$res){
            $res1 = $this->gameService->getPgProGames()->toArray();
            $res = $res1;
            $params = [];
            $params['platform'] = 'PGS';
            $res2 = $this->gameService->getGameslimitlast($params)->toArray();
            $array = array_merge($res1['data'],$res2);
            $res['data'] = $array;
        }

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
        $params['game_plat'] = CommonEnum::GAME_PLAT_PG;
        
        event(new UserGameEvent($user, $params));

        if($user->coin < $gameInfo->en_coin) {
            return Result::error("Menos de {$gameInfo['en_coin']} moedas");
        }

        return Result::success(['code' => $gameInfo['game_code'] ?? '']);
    } 

    public function tadaUrl()
    {
        $id = intval(Request::get('id', 0));
        $gameInfo = $this->gameService->getTadaGameInfo($id);
        if(!$gameInfo) {
            return Result::error('not find game');
        }

        $user = Auth::user();
        $params = [];
        $params['ip'] = Request::getClientIp();
        $params['game_id'] = $gameInfo['id'];
        $params['game_plat'] = CommonEnum::GAME_PLAT_TADA;
        
        event(new UserGameEvent($user, $params));
        if($user->coin < $gameInfo->en_coin) {
            return Result::error("Menos de {$gameInfo['en_coin']} moedas");
        }

        return Result::success(['code' => $gameInfo['game_code'] ?? '']);
    }

    public function pgproUrl()
    {
        $id = intval(Request::get('id', 0));
        $gameInfo = $this->gameService->getPgProGameInfo($id);
        if(!$gameInfo) {
            return Result::error('not find game');
        }

        $user = Auth::user();
        $params = [];
        $params['ip'] = Request::getClientIp();
        $params['game_id'] = $gameInfo['id'];
        $params['game_plat'] = CommonEnum::GAME_PLAT_PGPRO;
        
        event(new UserGameEvent($user, $params));
        if($user->coin < $gameInfo->en_coin) {
            return Result::error("Menos de {$gameInfo['en_coin']} moedas");
        }

        return Result::success(['code' => $gameInfo['game_code'] ?? '']);
    }
}
<?php
namespace App\Services;

use App\Repositories\DPgGameRepository;
use App\Common\Message\CodeMsg;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GameService
{
    private $pgRepo;

    public function __construct(DPgGameRepository $pgRepo)
    {
        $this->pgRepo  = $pgRepo;
    }

    public function getPGGames(array $params)
    {
        return $this->pgRepo->getGames($params);
    }

    public function getDPGGameInfo(int $id)
    {
        return $this->pgRepo->find($id);
    }

    /**
     * 获取PG游戏地址
     * @param string $gameCode
     * @param mixed $user
     * @return mixed
     */
    public function getPgGameUrl($gameCode, $user)
    {
        $params = [];
        $pre = env('THIRD_GAME_PRE_USER', false);
        if(empty($pre)){
            return genJsonRes(CodeMsg::CODE_ERROR, [], 'not find pre user');
        }
        $params['user_id'] = $pre . 'x' . $user['uid'];
        $params['game_code'] = $gameCode;
        $params['ip_address'] = $user['reg_ip'];
        $params['home_url'] = 'http://www.fc88.top';
        $query = http_build_query($params);

        $url = env('THIRD_GAME_CENTER_ADDR', '') . env('THIRD_GAME_LOGIN_URI', '') . '?' . $query;
        $client = new Client();
        $res = $client->get($url);
        Log::debug("url:" . $url);
        $res = $res->getBody()->getContents();
        Log::debug("res:" . json_encode($res));
        return json_decode($res, true);
    }
}

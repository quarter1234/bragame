<?php
namespace App\Services;

use App\Common\Enum\GameEnum;
use App\Helper\LogHelper;
use App\Repositories\DPgGameRepository;
use App\Repositories\SConfigRepository;
use App\Repositories\DPgGameBetsRepository;
use App\Repositories\CoinLogRepository;
use App\Repositories\UserRepository;
use App\Common\Message\CodeMsg;
use GuzzleHttp\Client;
use App\Facades\User;
use App\Helper\SystemConfigHelper;
use App\Helper\RewardHelper;
use Log;

class GameService
{
    private $pgRepo;
    private $sconfig;
    private $pgbets;
    private $coinlog;
    private $defauRespData = [
        "status" => "SC_OK",
        "data" => [
            "username" => "",
            "balance" => 0,
        ]
    ];

    private $gamePlatTb = [
        "PGS" => 2,
        "PP" => 3,
    ];

    private $commissTb = [
        "PGS" => 3,
        "PP" => 4,
    ];

    public function __construct(DPgGameRepository $pgRepo,
                                SConfigRepository $sconfig,
                                DPgGameBetsRepository $pgbets,
                                CoinLogRepository $coinlog)
    {
        $this->pgRepo  = $pgRepo;
        $this->sconfig = $sconfig;
        $this->pgbets = $pgbets;
        $this->coinlog = $coinlog;
    }

    public function getPGGames(array $params)
    {
        return $this->pgRepo->getGames($params);
    }

    public function getDPGGameInfo(int $id)
    {
        return $this->pgRepo->find($id);
    }

    public function getDPGameByCode($gameCode){
        if(empty($gameCode)){
            return null;
        }

        return $this->pgRepo->getPgGameByCode($gameCode);
    }

    public function getPGGameBet(int $id){
        return $this->pgbets->find($id);
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

    public function checkSign($uid, $sign){
        $key = env('THIRD_GAME_SIGN_KEY', false);
        if(!$key){
            return false;
        }
        $genSign = strtolower(md5("id={$uid}&key={$key}}"));
        if($sign != $genSign) {
            return false;
        }

        return true;
    }

    public function getUserBalance($uid, $user){
        $this->defauRespData['data']['balance'] = $user['coin'];
        $this->defauRespData['data']['username'] = $uid;
        return $this->defauRespData;
    }

    private function _addBetData(int $uid, array $betParams){
        $transactionId = isset($betParams['transaction_id']) ? $betParams['transaction_id'] : '';
        $betId = isset($betParams['bet_id']) ? $betParams['bet_id'] : '';
        $externalTransactionId = isset($betParams['external_transaction_id']) ? $betParams['external_transaction_id'] : '';
        $gameOrderId = isset($betParams['game_order_id']) ? $betParams['game_order_id'] : '';
        $currency = isset($betParams['currency']) ? $betParams['currency'] : '';
        $gameCode = isset($betParams['game_code']) ? $betParams['game_code'] : '';
        $game = $this->getDPGameByCode($gameCode);
        if(!$game){
            return false;
        }

        $gameCategoryCode = $game->category_code ?? '';
        $platform = $game->platform ?? "";
        $gameName = $game->game_name ?? "";
        $gameId = $game->id;
        $betAmount = $betParams['bet_amount'] ?? 0;
        $winLoseAmount = $betParams['winlose_amount'] ?? 0;
        $effectiveTurnover = $betParams['effective_turnover'] ?? 0;
        $winLoss = $betParams['win_loss'] ?? 0;
        $jackpotAmount = $betParams['jackpot_amount'] ?? 0;
        $resultType = isset($betParams['result_type']) ? $betParams['result_type'] : '';
        $isFreespin = $betParams['is_freespin'] ?? 0;
        $isEndRound= $betParams['is_end_round'] ?? 0;
        $validAmount = $betParams['valid_amount'] ?? 0;
        $settledAmount = $betParams['settled_amount'] ?? 0;
        if(empty($resultType) && $settledAmount == 0){
            $settledAmount = $winLoseAmount - $betAmount;
        }

        $betTime = isset($betParams['bet_time']) ? $betParams['bet_time'] : '';
        $settledTime = $betParams['settled_time'] ?? 0;
        $lastUpdateTime = isset($betParams['last_update_time']) ? $betParams['last_update_time'] : '';
        $betStamp = $betParams['bet_stamp'] ?? 0;
        $platApp = isset($betParams['plat_app']) ? $betParams['plat_app'] : '';
        $addData = [
            "uid" =>  $uid,
            "transaction_id" => $transactionId,
            "bet_id" => $betId,
            "external_transaction_id" => $externalTransactionId,
            "game_order_id" => $gameOrderId,
            "currency"  => $currency,
            "game_category_code" => $gameCategoryCode,
            "platform" => $platform,
            "game_name" => $gameName,
            "game_code" => $gameCode,
            "game_id" => $gameId,
            "bet_amount" => $betAmount,
            "winlose_amount" => $winLoseAmount,
            "effective_turnover" => $effectiveTurnover,
            "win_loss" => $winLoss,
            "jackpot_amount" => $jackpotAmount,
            "result_type" => $resultType,
            "is_freespin" => $isFreespin,
            "is_end_round" => $isEndRound,
            "valid_amount" => $validAmount,
            "settled_amount" => $settledAmount,
            "last_update_time" => $lastUpdateTime,
            "bet_stamp" => $betStamp,
            "plat_app" => $platApp,
            "bet_time" => $betTime,
            "settled_time" => $settledTime,
        ];

        $pgBetId = $this->pgbets->insert($addData);
        return $pgBetId;
    }

    private function _upUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw){
        $upData = [
            "status" => $status,
            "before_amount" => $beforeAmount,
            "after_amount" => $afterAmount,
            "can_draw" => $canDraw,
        ];
        $this->pgbets->storePgGameBet($betId, $upData);
    }

    private function _betDoing($betId){
        $status = 4;  // 处理中
        $beforeAmount = 0;
        $afterAmount = 0;
        $canDraw = 0;
        $this->_upUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw);
    }

    private function _reduceCoin($user, $upCoin, $gameId, $gamePlat, $relBetId, $msg = false){
        $reduceCoin = -$upCoin;
//        $alterlog = "pg游戏投注扣除金币:" . $reduceCoin;
        list($beforecoin, $aftercoin) = User::alterUserCoin($user, $reduceCoin, GameEnum::PDEFINE['ALTERCOINTAG']['BET']);
        $inLog = $gameId . " 修改金币:" . $reduceCoin;
        LogHelper::insertCoinLog($user->id, $beforecoin, $reduceCoin, $aftercoin, $inLog, $gameId, GameEnum::PDEFINE['ALTERCOINTAG']['BET'], 2, $gamePlat, $relBetId);
        return ["beforecoin" => $beforecoin, "aftercoin" => $aftercoin];
    }

    public function pgBetResult(int $uid, array $betParams, $user){
        $platConfig = SystemConfigHelper::getByKey('plat_app_id');
        if(!$platConfig || $platConfig['v'] != $betParams['plat_app']){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        if(!$user){
            $this->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return $this->defauRespData;
        }

        $betId = $this->_addBetData($uid, $betParams);
        if(empty($betId)){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        $betTb = $this->getPGGameBet($betId);
        if(!$betTb){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        $game = $this->getDPGGameInfo($betTb->game_id);
        if(!$game){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        $relBetId = $betTb->id;
        $resultType = $betTb->result_type ?? "";
        $platApp = $betTb->plat_app ?? "";
        $betAmount = $betTb->bet_amount ?? 0;
        $winLoseAmount = $betTb->winlose_amount ?? 0;
        $settledAmount = $betTb->settled_amount ?? 0;
        $isEndRound = $betTb->is_end_round ?? 0;
        $gameName = $game->game_name ?? "";
        $gameId = $game->id ?? 0;
        $currPlatForm = $game->platform;
        $betStatus = $betTb->status ?? 0;
        if($betStatus > 0){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        $this->defauRespData['data']['username'] = $uid;
        if($user->isbindphone <= 0){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        if($resultType != "END" && $user->coin < $betAmount){
            $this->defauRespData['status'] = 'SC_INSUFFICIENT_FUNDS';
            return $this->defauRespData;
        }

        $ok = false;
        $msg = "";
        $beforecoin = $user->coin;
        $aftercoin = $beforecoin;
        $beforeAmount = $beforecoin;
        $canDraw = 0;
        $gamePlat = 2;
        $commType = 3;
        foreach($this->gamePlatTb as $gk => $gv){
            if($gk == $currPlatForm){
                $gamePlat = $gv;
                break;
            }
        }

        foreach($this->commissTb as $ck => $cv){
            if($ck == $currPlatForm){
                $commType = $cv;
                break;
            }
        }

        $this->_betDoing($relBetId); // 处理中
        if(empty($resultType)){ // 投注
            if($betAmount > 0){
                $reduceRes = $this->_reduceCoin($user, $betAmount, $gameId, $gamePlat, $relBetId);
                $beforecoin = $reduceRes['beforecoin'];
                $aftercoin = $reduceRes['aftercoin'];
                $effbet = $betAmount - $winLoseAmount;
                if($effbet > 0){ // 按照有效下注的概念，给上级返利
                    RewardHelper::gameRebate($uid, GameEnum::PDEFINE['ALTERCOINTAG']['BET'], $effbet, $gameId, $commType);
                }
            }
        }
        else if($resultType != "END"){
            if($resultType == "WIN"){
                if($winLoseAmount > 0){

                }
            }
        }

    }
}

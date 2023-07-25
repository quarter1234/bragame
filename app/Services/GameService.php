<?php
namespace App\Services;

use App\Cache\AllUseGameDrawCache;
use App\Common\Enum\GameEnum;
use App\Helper\LogHelper;
use App\Repositories\DPgGameRepository;
use App\Repositories\SConfigRepository;
use App\Repositories\DPgGameBetsRepository;
use App\Repositories\CoinLogRepository;
use App\Common\Message\CodeMsg;
use GuzzleHttp\Client;
use App\Facades\User;
use App\Facades\Bets;
use App\Helper\SystemConfigHelper;
use App\Helper\RewardHelper;

class GameService
{
    private $pgRepo;
    private $sconfig;
    private $pgbets;
    private $coinlog;
    public $defauRespData = [
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
        // $appIdConfig = SystemConfigHelper::getByKey('plat_app_id');
        // if(!$appIdConfig){
        //     return genJsonRes(CodeMsg::CODE_ERROR, [], 'not find pre user');
        // }

        $appIpConfig = false;
        if($user['is_test'] == 0){
            $appIpConfig = SystemConfigHelper::getByKey('plat_app_ip');
            $appIdConfig = SystemConfigHelper::getByKey('plat_app_id');
        }
        else{
            $appIpConfig = SystemConfigHelper::getByKey('plat_test_app_ip');
            $appIdConfig = SystemConfigHelper::getByKey('plat_test_app_id');
        }

        if(!$appIpConfig){
            return genJsonRes(CodeMsg::CODE_ERROR, [], 'not find third game ip');
        }

        $pre = $appIdConfig;
        $params['user_id'] = $pre . 'x' . $user['uid'];
        $params['game_code'] = $gameCode;
        $params['ip_address'] = $user['reg_ip'];
        $params['home_url'] = 'http://www.fc88.top';
        $query = http_build_query($params);

        $host = $appIpConfig . ':83/';
        $url = $host . env('THIRD_GAME_LOGIN_URI', '') . '?' . $query;

        $client = new Client();
        $res = $client->get($url);
        $res = $res->getBody()->getContents();
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
        $isTest = $betParams['is_test'] ?? 0;
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
            "is_test" => $isTest,
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

    private function _betOver($betId, $beforeAmount, $afterAmount, $canDraw){
        $status = 1;
        $this->_upUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw);
    }

    /**
     * 投注
     * @param $user
     * @param $upCoin
     * @param $gameId
     * @param $gamePlat
     * @param $relBetId
     * @param false $msg
     * @return array
     */
    private function _reduceCoin($user, $upCoin, $gameId, $gamePlat, $relBetId, $msg = false){
        $reduceCoin = -$upCoin;
//        $alterlog = "pg游戏投注扣除金币:" . $reduceCoin;
        $title = $gameId . '投注:变化金额:';
        list($beforecoin, $aftercoin) = RewardHelper::alterCoinLog($user, $reduceCoin, GameEnum::PDEFINE['ALTERCOINTAG']['BET'], $gameId, $title, $gamePlat, $relBetId);
        return ["beforecoin" => $beforecoin, "aftercoin" => $aftercoin];
    }

    /**
     * 赢分
     * @param $user
     * @param $winLoseAmount
     * @param $gameId
     * @param $gamePlat
     * @param $relBetId
     * @return array
     */
    private function _addCoin($user, $winLoseAmount, $gameId, $gamePlat, $relBetId){
        $title = $gameId . '赢分:变化金额:';
        list($beforecoin, $aftercoin) = RewardHelper::alterCoinLog($user, $winLoseAmount, GameEnum::PDEFINE['ALTERCOINTAG']['WIN'], $gameId, $title, $gamePlat, $relBetId);
        return ["beforecoin" => $beforecoin, "aftercoin" => $aftercoin];
    }

    private function _addTaxLog($user, $gameName, $gameId, $relBetId, $platApp, $betAmount, $winLoseAmount, $settledAmount, $platform){
        LogHelper::addCenterTaxLog($user['uid'], $gameName, $gameId, $relBetId, $platApp, $betAmount, $winLoseAmount, $settledAmount, $platform);
    }

    /**
     * 第三方游戏的投注和赢分
     * @param $user
     * @param array $betParams
     * @return array
     */
    public function pgBetResult($user, array $betParams){
        $uid = $user['uid'];
        $platConfig = SystemConfigHelper::getByKey('plat_app_id');
        if(!$platConfig || $platConfig != $betParams['plat_app']){
            $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
            return $this->defauRespData;
        }

        if(!$user){
            $this->defauRespData['status'] = 'SC_USER_NOT_EXISTS';
            return $this->defauRespData;
        }

        $betParams['is_test'] = $user['is_test'];
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

        $canDraw = 0;
        $this->_betDoing($relBetId); // 处理中
        if(empty($resultType)){ // 投注
            if($betAmount > 0){
                $reduceRes = $this->_reduceCoin($user, $betAmount, $gameId, $gamePlat, $relBetId);
                $beforecoin = $reduceRes['beforecoin'];
                $aftercoin = $reduceRes['aftercoin'];
                // $effbet = $betAmount - $winLoseAmount;
                $effbet = $betAmount;
                if($effbet > 0){ // 按照下注的概念，给上级返利
                    RewardHelper::gameRebate($uid, GameEnum::PDEFINE['TYPE']['SOURCE']['BET'], $effbet, $gameId, $commType);
                }
            }
        }
        else if($resultType != "END"){ // -- 结算
            if($resultType == "WIN"){
                if($winLoseAmount > 0){
                    $addCoinRes = $this->_addCoin($user, $winLoseAmount, $gameId, $gamePlat, $relBetId);
                    $beforecoin = $addCoinRes['beforecoin'];
                    $aftercoin = $addCoinRes['aftercoin'];
                }
            }
            else if($resultType == "BET_WIN"){
                if($betAmount > 0){
                    $reduceRes = $this->_reduceCoin($user, $betAmount, $gameId, $gamePlat, $relBetId);
                    $beforecoin = $reduceRes['beforecoin'];
                    $aftercoin = $reduceRes['aftercoin'];
                }

                if($winLoseAmount > 0){
                    $addCoinRes = $this->_addCoin($user, $winLoseAmount, $gameId, $gamePlat, $relBetId);
                    $beforecoin = $addCoinRes['beforecoin'];
                    $aftercoin = $addCoinRes['aftercoin'];
                }
            }
            else if($resultType == "BET_LOSE"){
                if($betAmount > 0){
                    $reduceRes = $this->_reduceCoin($user, $betAmount, $gameId, $gamePlat, $relBetId);
                    $beforecoin = $reduceRes['beforecoin'];
                    $aftercoin = $reduceRes['aftercoin'];
                }
            }

            if($settledAmount !=0 && $betParams['is_test'] == 0){
                $this->_addTaxLog($user, $gameName, $gameId, $relBetId, $platApp, $betAmount, $winLoseAmount, $settledAmount, $currPlatForm);
            }

            $ispayer = $user['ispayer'] ?? 0;
            if($ispayer == 0){ // --未充值的会员不得提现
                $this->_betOver($betId, $beforeAmount, $user['coin'], $canDraw);
            }

            $isAllUseDraw = AllUseGameDrawCache::getIsAllUseDraw($uid);
            $canDraw = Bets::checkBets($user, $isAllUseDraw);
            $effbet = $betAmount;
            if($effbet > 0){ // 按照下注的概念，给上级返利
                RewardHelper::gameRebate($uid, GameEnum::PDEFINE['TYPE']['SOURCE']['BET'], $effbet, $gameId, $commType);
            }
        }

        if($isEndRound == 1){
            AllUseGameDrawCache::removeUserDraw($uid);
        }

        // -- 完成
        $this->_betOver($betId, $beforeAmount, $aftercoin, $canDraw);
        $this->defauRespData['data']['balance'] = $aftercoin;
        return $this->defauRespData;
    }
}

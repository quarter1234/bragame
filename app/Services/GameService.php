<?php
namespace App\Services;

use App\Cache\AllUseGameDrawCache;
use App\Common\Enum\GameEnum;
use App\Helper\LogHelper;
use App\Repositories\DJlGameBetsRepository;
use App\Repositories\DPgGameRepository;
use App\Repositories\DJlGameRepository;
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
    private $jlRepo;
    private $sconfig;
    private $pgbets;
    private $coinlog;
    private $jlbets;
    public $defauRespData = [
        "status" => "SC_OK",
        "data" => [
            "username" => "",
            "balance" => 0,
        ]
    ];

    public $jiliRespData = [
        "errorCode" => 0,
        "message" => "success",
        "username" => 0,
        "balance" => 0,
        "currency" => "BRL",
    ];

    public static $jiliToCurrData = [
        "America/Sao_Paulo" => "BRL",
    ];

    public $jiliErrorCode = [
        "SUCCESS" => 0,
        "Al_ACCEPT" => 1,
        "NOT_ENOUGH" => 2,
        "INV_PARAM" => 3,
        "TOKEN_EXP" => 4,
        "OTHER_ERROR" => 5,
    ];

    private $gamePlatTb = [
        "Jl" => 1,
        "PGS" => 2,
        "PP" => 3,
    ];

    private $commissTb = [
        "Jl" => 2,
        "PGS" => 3,
        "PP" => 4,
    ];

    public function __construct(DPgGameRepository $pgRepo,
                                SConfigRepository $sconfig,
                                DPgGameBetsRepository $pgbets,
                                CoinLogRepository $coinlog,
                                DJlGameRepository $jlRepo,
                                DJlGameBetsRepository $jlbets
                                )
    {
        $this->pgRepo  = $pgRepo;
        $this->sconfig = $sconfig;
        $this->pgbets = $pgbets;
        $this->coinlog = $coinlog;
        $this->jlRepo = $jlRepo;
        $this->jlbets = $jlbets;

        $this->jiliRespData['currency'] = self::$jiliToCurrData[config('app.timezone')] ?? "BRL";
    }

    public function getPGGames(array $params)
    {
        return $this->pgRepo->getGames($params);
    }

    public function getTadaGames(){
        return $this->jlRepo->getGames();
    }

    public function getDPGGameInfo(int $id)
    {
        return $this->pgRepo->find($id);
    }

    public function getTadaGameInfo(int $id)
    {
        return $this->jlRepo->find($id);
    }

    public function getDPGameByCode($gameCode){
        if(empty($gameCode)){
            return null;
        }

        return $this->pgRepo->getPgGameByCode($gameCode);
    }

    public function getJiliGameByCode($gameCode){
        if(empty($gameCode)){
            return null;
        }

        return $this->jlRepo->getJlGameByCode($gameCode);
    }

    public function getPGGameBet(int $id){
        return $this->pgbets->find($id);
    }

    public function getJlGameBet(int $id){
        return $this->jlbets->find($id);
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
        $params['home_url'] = 'https://www.belawin.com';
        $query = http_build_query($params);

        $host = $appIpConfig . ':83/';
        $url = $host . env('THIRD_GAME_LOGIN_URI', '') . '?' . $query;

        $client = new Client();
        $res = $client->get($url);
        $res = $res->getBody()->getContents();
        return json_decode($res, true);
    }

    public function getJiliGameUrl($gameCode, $user){
        $params = [];
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
        $params['game_id'] = $gameCode;
        $query = http_build_query($params);
        $host = $appIpConfig . ':83/';
        $url = $host . env('JILI_GAME_LOGIN_URI', '') . '?' . $query;
        $client = new Client();
        $res = $client->get($url);
        $res = $res->getBody()->getContents();
        return json_decode($res, true);
    }

    public function jiliBetResult($user, array $betParams){
        if($user['is_test'] == 0){
            $platConfig = SystemConfigHelper::getByKey('plat_app_id');
            if(!$platConfig || $platConfig != $betParams['plat_app']){
                $this->jiliRespData['errorCode'] = $this->jiliErrorCode['INV_PARAM'];
                $this->jiliRespData['message'] = "param is error!";
                return $this->jiliRespData;
            }
        }
        else{
            $platConfig = SystemConfigHelper::getByKey('plat_test_app_id');
            if(!$platConfig || $platConfig != $betParams['plat_app']){
                $this->jiliRespData['errorCode'] = $this->jiliErrorCode['INV_PARAM'];
                $this->jiliRespData['message'] = "param is error!";
                return $this->jiliRespData;
            }
        }

        if(!$user){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "user is not exist";
            return $this->jiliRespData;
        }

        $betParams['is_test'] = $user['is_test'];
        list($game, $betId)  = $this->_addJiliBetData($user['uid'], $betParams);
        if(empty($betId)){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "betid is not exist";
            return $this->jiliRespData;
        }

        if(!$game){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "game is not exist";
            return $this->jiliRespData;
        }

        $betTb = $this->getJlGameBet($betId);
        if(!$betTb){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "bet is not exist";
            return $this->jiliRespData;
        }

        $relBetId = $betTb->id;
        $betStatus = $betTb->status ?? 0;
        $betType = $betTb->type ?? 0;
        $platApp = $betTb->plat_app ?? "";
        $settledAmount = $betTb->settled_amount ?? 0;
        $winloseAmount = $betTb->winlose_amount ?? 0;
        $gameName = $game->game_name ?? "";
        $gameId = $game->id ?? 0;
        $currPlatForm = $game->platform;
        $betAmount = $betTb->bet_amount ?? 0;
        if($betStatus > 0){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "bet is do!";
            return $this->jiliRespData;
        }

        if($user->isbindphone <= 0){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "phone no bind!";
            return $this->jiliRespData;
        }

        if($user->coin < $betAmount){
            $this->jiliRespData['errorCode'] = $this->jiliErrorCode['OTHER_ERROR'];
            $this->jiliRespData['message'] = "coin is not enough";
            return $this->jiliRespData;
        }

        $uid = $user['uid'];
        $this->jiliRespData['username'] = $uid;
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

        $this->_jlBetDoing($relBetId); // 处理中
        if($betType == 0 || $betType == 1){  // -- 投注
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

        if($betType == 0 || $betType == 2){ // -- 结算
            if($betType == 2 && $betAmount > 0){
                $reduceRes = $this->_reduceCoin($user, $betAmount, $gameId, $gamePlat, $relBetId);
                $beforecoin = $reduceRes['beforecoin'];
                $aftercoin = $reduceRes['aftercoin'];
                // $effbet = $betAmount - $winLoseAmount;
                $effbet = $betAmount;
                if($effbet > 0){ // 按照下注的概念，给上级返利
                    RewardHelper::gameRebate($uid, GameEnum::PDEFINE['TYPE']['SOURCE']['BET'], $effbet, $gameId, $commType);
                }
            }

            if($winloseAmount > 0){
                $addCoinRes = $this->_addCoin($user, $winloseAmount, $gameId, $gamePlat, $relBetId);
                $beforecoin = $addCoinRes['beforecoin'];
                $aftercoin = $addCoinRes['aftercoin'];
            }
        }

        if($betType == 0 || $betType == 2){
            if($settledAmount != 0 && $betParams['is_test'] == 0){
                // $this->_addTaxLog($user, $gameName, $gameId, $relBetId, $platApp, $betAmount, $winloseAmount, $settledAmount, $currPlatForm);
            }
        }

        $canDraw = 0;
        $ispayer = $user['ispayer'] ?? 0;
        if($betType == 0 || $betType == 2){ // -- 结算
            if($ispayer == 0){ // --未充值的会员不得提现
                $this->_jlBetOver($betId, $beforeAmount, $aftercoin, $canDraw);
                $this->jiliRespData['balance'] = $aftercoin;
                return $this->jiliRespData;
            }
            $isAllUseDraw = AllUseGameDrawCache::getIsAllUseDraw($uid);
            $canDraw = Bets::checkBets($user, $isAllUseDraw);
            AllUseGameDrawCache::removeUserDraw($uid);
        }

        // -- 完成
        $this->_jlBetOver($betId, $beforeAmount, $aftercoin, $canDraw);
        $this->jiliRespData['balance'] = $aftercoin;
        return $this->jiliRespData;
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

    public function getUserJiliBalance($uid, $user){
        $this->jiliRespData['balance'] = $user['coin'];
        $this->jiliRespData['username'] = $uid;
        return $this->jiliRespData;
    }

    private function _addJiliBetData(int $uid, array $betParams): array{
        $game = $this->getJiliGameByCode($betParams['game_code'] ?? 0);
        if(!$game){
            return [false, false];
        }
        $gameType = $game->game_type ?? 0;
        $gameName = $game->game_name ?? '';
        $gameId = $game->id ?? 0;
        $now = time();
        $nowStr = Date('Y-m-d H:i:s');
        $addData = [
            'bet_type' => isset($betParams['bet_type']) ? $betParams['bet_type'] : 1,
            'uid' => $uid,
            'player_id' => isset($betParams['player_id']) ? $betParams['player_id'] : '',
            'currency' => isset($betParams['currency']) ? $betParams['currency'] : 'BRL',
            'game_type' => $gameType,
            'platform' => isset($betParams['platform']) ? $betParams['platform'] : '',
            'game_name' => $gameName,
            'game_code' => isset($betParams['game_code']) ? $betParams['game_code'] : 0,
            'game_id' => $gameId,
            'bet_amount' => isset($betParams['bet_amount']) ? $betParams['bet_amount'] : 0,
            'winlose_amount' => isset($betParams['winlose_amount']) ? $betParams['winlose_amount'] : 0,
            'valid_amount' => isset($betParams['valid_amount']) ? $betParams['valid_amount'] : 0,
            'settled_amount' => isset($betParams['settled_amount']) ? $betParams['settled_amount'] : 0,
            'game_order_id' => isset($betParams['game_order_id']) ? $betParams['game_order_id'] : '',
            'session_id' => isset($betParams['session_id']) ? $betParams['session_id'] : '',
            'type' => isset($betParams['type']) ? $betParams['type'] : 0,
            'session_total_bet' => isset($betParams['session_total_bet']) ? $betParams['session_total_bet'] : 0,
            'turnover' => isset($betParams['turnover']) ? $betParams['turnover'] : 0,
            'preserve' => isset($betParams['preserve']) ? $betParams['preserve'] : 0,
            'bet_time' => isset($betParams['bet_time']) ? $betParams['bet_time'] : $nowStr,
            'bet_stamp' => isset($betParams['bet_stamp']) ? $betParams['bet_stamp'] : $now,
            'plat_app' => isset($betParams['plat_app']) ? $betParams['plat_app'] : '',
            'is_test' => isset($betParams['is_test']) ? $betParams['is_test'] : 0,
        ];

        $jlBetId = $this->jlbets->insert($addData);
        return [$game, $jlBetId];
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

    private function _upJlUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw){
        $upData = [
            "status" => $status,
            "before_amount" => $beforeAmount,
            "after_amount" => $afterAmount,
            "can_draw" => $canDraw,
        ];
        $this->jlbets->storeJlGameBet($betId, $upData);
    }

    private function _betDoing($betId){
        $status = 4;  // 处理中
        $beforeAmount = 0;
        $afterAmount = 0;
        $canDraw = 0;
        $this->_upUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw);
    }

    private function _jlBetDoing($betId){
        $status = 4;  // 处理中
        $beforeAmount = 0;
        $afterAmount = 0;
        $canDraw = 0;
        $this->_upJlUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw);
    }

    private function _betOver($betId, $beforeAmount, $afterAmount, $canDraw){
        $status = 1;
        $this->_upUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw);
    }

    private function _jlBetOver($betId, $beforeAmount, $afterAmount, $canDraw){
        $status = 1;
        $this->_upJlUserBetStatus($betId, $status, $beforeAmount, $afterAmount, $canDraw);
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

        if($user['is_test'] == 0){
            $platConfig = SystemConfigHelper::getByKey('plat_app_id');
            if(!$platConfig || $platConfig != $betParams['plat_app']){
                $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
                return $this->defauRespData;
            }
        }
        else{
            $platConfig = SystemConfigHelper::getByKey('plat_test_app_id');
            if(!$platConfig || $platConfig != $betParams['plat_app']){
                $this->defauRespData['status'] = 'SC_WRONG_PARAMETERS';
                return $this->defauRespData;
            }
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
                $this->defauRespData['data']['balance'] = $aftercoin;
                return $this->defauRespData;
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

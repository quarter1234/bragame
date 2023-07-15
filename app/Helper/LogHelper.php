<?php
namespace App\Helper;

use App\Repositories\CoinLogRepository;
use App\Repositories\DCenterTaxLogRepository;
use App\Repositories\DUserMatchBetsLogRepository;
use App\Repositories\SSendCoinRepository;
use App\Repositories\DLogSenddrawRepository;

class LogHelper{
    public static function insertCoinLog($uid, $beforecoin, $altercoin, $aftercoin, $alterlog, $gameId, $type, $state = 0, $gamePlat = 0, $relBetId = 0){
        $now = time();
        $addData = [
            'uid' => $uid,
            'type' => $type,
            'game_id' => $gameId,
            'before_coin' => $beforecoin,
            'coin' => $altercoin,
            'after_coin' => $aftercoin,
            'log' => $alterlog,
            'state' => $state,
            'updatetime' => $now,
            'time' => $now,
            'cache_uniqueid' => 0,
            'game_plat' => $gamePlat,
            'rel_bet_id' => $relBetId,
        ];
        $coinLogRep = app()->make(CoinLogRepository::class);
        $coinLogRep->storeCoinLog($addData);
    }

    public static function addSendLog($uid, $coin, $actType, $level, $scale, $diamond, $svip){
        $now = time();
        $addData = [
            'uid' => $uid,
            'coin' => $coin,
            'create_time' => $now,
            'act' => $actType,
            'level' => $level,
            'scale' => $scale,
            'diamond' => $diamond,
            'svip' => $svip,
        ];

        $sendCoinLogRep = app()->make(SSendCoinRepository::class);
        $sendCoinLogRep->storeSendCoinLog($addData);
    }

    public static function addSenddrawLog($uid, $title, $coin, $actType){
        $now = time();
        $addData = [
            "orderid" => genSingleOrderId(),
            "title" => $title,
            "coin" => $coin,
            "create_time" => $now,
            "category" => $actType,
            "uid" => $uid,
            "suid" => 0,
        ];

        $sendDrawLogRep = app()->make(DLogSenddrawRepository::class);
        $sendDrawLogRep->storeSendDrawLog($addData);
    }

    public static function addCenterTaxLog($uid, $gameName, $gameId, $relBetId, $platApp, $betAmount, $winLoseAmount, $settledAmount, $platform){
        $now = time();
        $rate = 0;
        $rateAmount = 0;
        $addData = [
            "uid" => $uid,
            "game_name" => $gameName,
            "game_id" => $gameId,
            "rel_bet_id" => $relBetId,
            "plat_app" => $platApp,
            "bet_amount" => $betAmount,
            "winlose_amount" => $winLoseAmount,
            "settled_amount" => $settledAmount,
            "create_time" => $now,
            "rate" => $rate,
            "rate_amount" => $rateAmount,
            "platform" => $platform,
        ];

        $rep = app()->make(DCenterTaxLogRepository::class);
        $rep->storeCenterTaxLog($addData);
    }

    public static function addMatchBetsLog($uid, $cashCoin, $userBets, $isAllUseDraw, $cost, $canDraw, $matchId){
        if($uid){
            $now = time();
            $addData = [
                'uid' => $uid,
                'cash_coin' => $cashCoin,
                'user_bets' => $userBets,
                'is_user_draw' => $isAllUseDraw,
                'cost' => $cost,
                'can_draw' => $canDraw,
                'curr_match_bets_id' => $matchId,
                'create_time' => $now,
            ];
            $rep = app()->make(DUserMatchBetsLogRepository::class);
            $rep->storeMatchBetLog($addData);
        }
    }
}

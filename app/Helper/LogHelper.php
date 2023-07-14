<?php
namespace App\Helper;

use App\Repositories\CoinLogRepository;
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
}

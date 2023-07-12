<?php
namespace App\Common\Enum;

class GameEnum{
    const PDEFINE = [
        "ALTERCOINTAG" => [
            "UP" => 1, // 上分
            "DOWN" => 2, // 下分
            "BET" => 3, // 下注
            "WIN" => 4, // 赢钱
        ],
        "CACHE_LOG_KEY" => [
            "poolround_log" => "api_poolround",
            "coin_log" => "master_coin_log_key",
            "q_coins_log" => "api_coins_log",

        ],
        "TYPE" => [
            "SOURCE" => [
                "REG" => 1, // --下级注册
                "BUY" => 2, // --下级充值
                "BET" => 3, // --下级下注
                "QUEST" => 4, // --任务奖励
                "VIP" => 5, // --vip bonus
            ]
        ]
    ];
}

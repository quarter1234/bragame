<?php
namespace App\Common\Enum;

class GameEnum{
    const PDEFINE = [
        "ALTERCOINTAG" => [
            "UP" => 1, // 上分
            "DOWN" => 2, // 下分
            "BET" => 3, // 下注
            "WIN" => 4, // 赢钱
            // 奖励类型
            "AGENT_REG_REWARDS" => 130, // --下级注册奖励
            "AGENT_BUY_REWARDS" => 131, // --下级购买奖励
            "AGENT_BET_REWARDS" => 132, // --下级bet奖励
            "MAIL_REWARDS" => 136, // --邮件
            "VIP_BONUS" => 138, // --VIP奖励
        ],
        "CACHE_LOG_KEY" => [
            "poolround_log" => "api_poolround",
            "coin_log" => "master_coin_log_key",
            "q_coins_log" => "api_coins_log",

        ],
        "TYPE" => [ // 动作类型
            "SOURCE" => [
                "REG" => 1, // --下级注册
                "BUY" => 2, // --下级充值
                "BET" => 3, // --下级下注
                "QUEST" => 4, // --任务奖励
                "VIP" => 5, // -- vip升级
                "Mail" => 7, // --邮件奖励
            ]
        ],
        "GAME_TYPE" => [
            "SPECIAL" => [
                "QUEST" => 160000, // --任务奖励
            ]
        ]
    ];
}

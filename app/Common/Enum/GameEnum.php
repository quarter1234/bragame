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
            "SHOP_RECHARGE" => 15, // --商城充值
            "SHOP_SEND_REWARDS" => 148, // --商城赠送奖励
            "DOWNRETURN" => 137, // --拒绝draw，返回
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
                "UP_COIN" => 10000, // --下分
                "QUEST" => 160000, // --任务奖励
                "STORE_BUY" => 40000, // --商城购买
                "STORE_SEND" => 41000, // --商城赠送
                "MAILATTACH" => 150000, // --邮件附件
                "BOX_AWRAD" => 188010, // -- 宝箱奖励
                "AGENT_WEEK_AWARD" => 188011, // -- 工资奖励
                "DRAW_RETURN" => 188007, // --拒绝提现
            ]
        ],
        "RET" => [
            "SUCCESS" => 200,
            "ERROR" => [
                "ORDER_PAID_ORDER_NOT_FOUND" => 1061, // --支付验证订单号错误
                "PLAYER_NOT_FOUND" =>  405, // -- 找不到玩家
                "DRAW_ERR_PARAM_COIN" => 548, // 提现 金币必须大于0
                "DRAW_ERR_BANKINFO" => 549, // draw 账户信息不存在
            ],
        ]
    ];
}

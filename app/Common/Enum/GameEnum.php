<?php
namespace App\Common\Enum;

class GameEnum{
    const PDEFINE = [
        "ALTERCOINTAG" => [
            "UP" => 1, // 上分
            "DOWN" => 2, // 下分
            "BET" => 3, // 下注
            "WIN" => 4, // 赢钱
            'REDBAG' => 6, // 红包
            'DRAW' =>123, // 提现
            // 奖励类型
            "AGENT_REG_REWARDS" => 130, // --下级注册奖励
            "AGENT_BUY_REWARDS" => 131, // --下级购买奖励
            "AGENT_BET_REWARDS" => 132, // --下级bet奖励
            "MAIL_REWARDS" => 136, // --邮件
            "VIP_BONUS" => 138, // --VIP奖励
            "SHOP_RECHARGE" => 15, // --商城充值
            "SHOP_SEND_REWARDS" => 148, // --商城赠送奖励
            "DOWNRETURN" => 137, // --拒绝draw，返回
            "BOX_AWARD" => 149, // 宝箱奖励
            "AGENT_AWARD" => 150, // 周工资奖励
            "WEEK_BONUS" => 181, // VIP周工资
            "MONTH_BONUS" => 182, // VIP月工资
            "SIGNIN_REWARDS" => 153, // 签到奖励
            "WEEK_VIP" => 154, // -- vip周奖励
            "MONTH_VIP" => 155, // -- vip月奖励
            "REG_BONUS" => 156, // -- 注册赠送
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
                "BOX_AWARD" => 41, // -- 宝箱奖励
                "WEEK_AWARD" => 42, // -- 工资奖励
                "RedPacket" => 43, // -- 红包奖励
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
                "DOWN_COIN" => 20000, // --下分
            ]
        ],
        "RET" => [
            "SUCCESS" => 200,
            "ERROR" => [
                "ORDER_PAID_ORDER_NOT_FOUND" => 1061, // --支付验证订单号错误
                "PLAYER_NOT_FOUND" =>  405, // -- 找不到玩家
                "DRAW_ERR_PARAM_COIN" => 548, // 提现 金币必须大于0
                "DRAW_ERR_BANKINFO" => 549, // draw 账户信息不存在
                "FUND_NOT_FOUND" => 946, // --未找到
            ],
        ],
        "TYPENAME" => [
            1 => "Operação de sistema", // 上分
            2 => "Operação de sistema", // 下分
            3 => "Aposta", // 下注
            4 => "Ganhar dinheiro", // 赢钱
            6 => "Pacote vermelho", // 红包
            123 => "Retirar dinheiro", // 提现
            // 奖励类型
            130 => "Recompensas de registro de nível inferior", // --下级注册奖励
            131 => "Recompensas de compra subordinadas", // --下级购买奖励
            132 => "Recompensas de apostas de nível inferior", // --下级bet奖励
            136 => "Correio", // --邮件
            138 => "VIP Bônus", // --VIP奖励
            15 => "Recarrega", // --商城充值
            148 => "Distribua recompensas", // --商城赠送奖励
            137 => "Retirada recusada", // --拒绝draw，返回
            149 => "prêmio de caixa", // 宝箱奖励
            150 => "Recompensa salarial semanal", // 周工资奖励
            181 => "Salário semanal VIP", // VIP周工资
            182 => "Salário mensal VIP", // VIP月工资
            153 => "Sign-in rewards", // 签到奖励
            181 => "Recompensas semanales VIP", // VIP周工资
            182 => "Recompensa mensual VIP", // VIP月工资
            156 => "Bônus de inscrição", // 注册奖励
            153 => "Sign-in rewards", // 签到奖励
            181 => "Recompensas semanales VIP", // VIP周工资
            182 => "Recompensa mensual VIP", // VIP月工资
            156 => "Bônus de inscrição", // 注册奖励
        ],
    ];
}

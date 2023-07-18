<?php
namespace App\Services;

use App\Helper\LogHelper;
use App\Helper\RewardHelper;
use App\Repositories\DUserMatchBetsRepository;

class BetDrawService{
    private $mbRep;
    public function __construct(DUserMatchBetsRepository $mbRep){
        $this->mbRep  = $mbRep;
    }

    /**
     * 获得满足打码量要求下分到提现钱包
     * @param $user
     * @param $isAllUseDraw
     * @return float|int|mixed
     */
    public function checkBets($user, $isAllUseDraw){
        $userBets = $user['match_bets'];
        $coin = $user['coin'];
        $gamedraw = $user['gamedraw'];
        $cashCoin = roundCoin($coin - $gamedraw);
        $cost = 0;
        $canDraw = 0;
        if($cashCoin > 0){
            $matchBets = $this->mbRep->getUserMatchBet($user['uid']);
            if(!$matchBets || $isAllUseDraw == 1){
                $canDraw = $cashCoin;
            }
            else{
                $matchBets['amount'] = $matchBets['amount'] ?? 0;
                $baseBets = roundCoin($matchBets['amount'] * $matchBets['bet_mul']);
                $cost = $this->mbRep->optCost($user['uid'], $matchBets['id']);
                $cost = $cost ?? 0;
                if($userBets >= $baseBets){
                    $canDraw = $cashCoin - $cost; // -- 扣掉成本，剩余的纳入提现钱包
                    if($canDraw <= 0){
                        $canDraw = 0;
                    }

                    // -- 清除用户的打码量
                    $user['match_bets'] = 0;
                    // -- 把matchBets状态设置为已解除
                    $this->mbRep->setMatchBetsStatus($matchBets['id'], $userBets, $canDraw);
                }
                else{
                    $leftCash = $cashCoin - $cost;
                    if($leftCash <= 0){
                        // -- 清除用户的打码量
                        $user['match_bets'] = 0;
                        // -- 把matchBets状态设置为已解除
                        $this->mbRep->setMatchBetsStatus($matchBets['id'], $userBets, 0);
                    }
                }
            }

            if($canDraw > 0){ // 添加提现钱包
                $user['gamedraw'] = roundCoin($user['gamedraw'] + $canDraw);
            }

            // 及时保存
            $user->save();
            $matchId = 0;
            if($matchBets){
                $matchId = $matchBets['id'];
            }

            LogHelper::addMatchBetsLog($user['uid'], $cashCoin, $userBets, $isAllUseDraw, $cost, $canDraw, $matchId);
        }
        else if($cashCoin == 0 && $gamedraw > 0){
            // -- 不做任何处理
        }

        return $canDraw;
    }

    public function addUserBetMatch($uid, $orderid, $coin, $type){
        $kflag = 'pay_bet_mul';
        if($type  == 2){
            $kflag = 'send_bet_mul';
        }
        else if($type == 3){
            $kflag = 'mail_bet_mul';
        }


    }
}

<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DGiftCard;
use App\Models\DGiftCardLog;

class DGiftCardRepository extends Repository
{
    function model() {
        return DGiftCard::class;
    }

    function logModel() {
        return DGiftCardLog::class;
    }

    public function getGiftCardByCode($code) {
        return $this->model()::where('status', CommonEnum::ENABLE)->where('code', $code)->first();
    }

    public function getCardLogByUserId($cardId, $uid){
        return $this->logModel()::where('card_id', $cardId)->where(compact('uid'))->count();
    }

    public function decLeftNum($actId, $num = 1) {
        return $this->model()::where('id', $actId)->decrement('left_num', $num);
    }

    public function addCardLog($cardId, $mobile, $uid, $amount, $rateAmount) {
        if (!$cardId || !$mobile || !$uid) {
            return false;
        }
        $logData = [
            'card_id' => $cardId,
            'mobile' => $mobile,
            'uid' => $uid,
            'money' => $amount,
            'rate_amount' => $rateAmount,
            'create_time' => time()
        ];
        return $this->logModel()::insert($logData);
    }
}


<?php

namespace App\Services;

use App\Cache\UserCache;
use App\Common\Enum\CommonEnum;
use App\Common\Enum\GameEnum;
use App\Exceptions\BadRequestException;
use App\Helper\RewardHelper;
use App\Repositories\DGiftCardRepository;
use App\Repositories\DRedPacketRepository;
use App\Repositories\DRedPacketUserRepository;
use App\Repositories\DUserMatchBetsRepository;
use App\Repositories\UserRepository;

class GiftCardService
{
    private $giftCard;
    private $userRepo;

    public function __construct(
        DGiftCardRepository $giftCardRepo,
        UserRepository $userRepo
    )
    {
        $this->giftCard = $giftCardRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * 领取礼品卡
     * @param $mobile
     * @param $code
     * @return mixed
     * @throws BadRequestException
     */
    public function receiveCard($mobile, $code) {
        if (!$mobile || !$code) {
            throw new BadRequestException(['msg' => trans('param err')]);
        }

        $cardInfo = $this->giftCard->getGiftCardByCode($code);
        if (empty($cardInfo) || $cardInfo['status'] != 1) {
            throw new BadRequestException(['msg' => trans('Not find activity')]);
        }
        if ($cardInfo['left_num'] <= 0) {
            throw new BadRequestException(['msg' => trans('Not enough amount')]);
        }
        if ($cardInfo['start_time'] > time() || $cardInfo['end_time'] < time()) {
            throw new BadRequestException(['msg' => trans('out of date')]);
        }
        $userInfo = $this->userRepo->getUserByPhone($mobile);
        if (empty($userInfo)) {
            throw new BadRequestException(['msg' => trans('user not exist')]);
        }
        if ($cardInfo['only_recharge'] == 1 && $userInfo['totalrecharge'] == 0) {
            throw new BadRequestException(['msg' => trans('Only recharge user')]);
        }

        $userLog = $this->giftCard->getCardLogByUserId($cardInfo['id'], $userInfo['uid']);
        if (!empty($userLog)) {
            throw new BadRequestException(['msg' => trans('Had received')]);
        }

        $rateAmount = $cardInfo['amount'] * $cardInfo['rate'];
        $this->giftCard->decLeftNum($cardInfo['id']);
        $this->giftCard->addCardLog($cardInfo['id'], $mobile, $userInfo['uid'], $cardInfo['amount'], $rateAmount);
        $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['GIFT_CARD'];
        $alterlog = "礼品卡奖励";
        RewardHelper::alterCoinLog($userInfo, $cardInfo['amount'], $rewardsType, 0, $alterlog);

        $mbRep = new DUserMatchBetsRepository();
        $mbRep->addMatchBets($userInfo['uid'], $cardInfo['amount'], 5, $cardInfo['rate'], '');

        return true;
    }

}

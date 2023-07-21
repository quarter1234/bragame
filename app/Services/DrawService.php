<?php
namespace App\Services;

use App\Common\Enum\GameEnum;
use App\Exceptions\BadRequestException;
use App\Facades\User;
use App\Helper\RewardHelper;
use App\Helper\UserHelper;
use App\Repositories\DUserBankRepository;
use App\Repositories\DUserDrawRepository;

class DrawService
{
    private $bankRepo;
    private $drawRepo;

    public function __construct(DUserBankRepository $bankRepo, DUserDrawRepository $drawRepo)
    {
        $this->bankRepo  = $bankRepo;
        $this->drawRepo = $drawRepo;
    }

    /**
     * 申请提现
     *
     * @param array $params
     * @return mixed
     */
    public function drawApply(array $params)
    {
        $params['coin'] = intval($params['coin']);
        $handleCoin = -$params['coin'];

        $user = UserHelper::getUserByUid($params['uid']);
        if(!$user) {
            throw new BadRequestException(['msg' => 'Not found user info']); 
        }

        $drawCoin = $this->getCanDrawCoin($user);
        if($drawCoin < $params['coin']) {
            throw new BadRequestException(['msg' => 'Coin is short of draw']); 
        }

        $bankInfo = $this->bankRepo->getUserBankInfo($params['bankid'], $params['uid']);
        if(!$bankInfo) {
            throw new BadRequestException(['msg' => 'Not found bank info']); 
        }

        RewardHelper::alterCoinLog($user, $handleCoin, GameEnum::PDEFINE['ALTERCOINTAG']['DRAW']);
        User::updateGameDrawInDraw($user, $handleCoin);

        return $this->drawRepo->storeDraw($user,$params, $bankInfo);
    }

    

    /**
     * 获取可提现金额
     * @param mixed $user
     * @return int
     */
    public function getCanDrawCoin($user)
    {
        $drawCoin = $user['gamedraw'];
        if($drawCoin < 0) {
            $drawCoin = 0;
        }

        if($drawCoin > $user['coin']) {
            $drawCoin  = $user['coin'];
        }

        return $drawCoin;
    }
}
<?php
namespace App\Services;

use App\Cache\UserCache;
use App\Common\Enum\CommonEnum;
use App\Common\Enum\GameEnum;
use App\Exceptions\BadRequestException;
use App\Helper\RewardHelper;
use App\Repositories\DRedPacketRepository;
use App\Repositories\DRedPacketUserRepository;

class RedPackageService
{
    private $userRedPacket;
    private $redPacketRepo;

    public function __construct(
        DRedPacketUserRepository $userRedPacket,
        DRedPacketRepository $redPacketRepo
    )
    {
        $this->userRedPacket  = $userRedPacket;
        $this->redPacketRepo = $redPacketRepo;
    }

    /**
     * 获取抽奖结果
     * @param mixed $user
     * @return mixed
     */
    public function doLottery($user)
    {
        $currentTime = time();
        $info = $this->redPacketRepo->getCurrentInfo($currentTime);
        // 未存在
        if(!$info) {
            throw new BadRequestException(['msg' => 'Not find activity']);
        }

        // 已经领取过
        $haveLottery = $this->userRedPacket->getUserLottery($user, $info);
        if($haveLottery && $haveLottery['status'] == CommonEnum::ENABLE) {
            throw new BadRequestException(['msg' => "You have already picked it up"]);
        }
        
        $randCoin = rand($info['min_coin'], $info['max_coin']);
        RewardHelper::addCoinByRate($user->uid, $randCoin, '1:0:0', GameEnum::PDEFINE['TYPE']['SOURCE']['RedPacket']);
        UserCache::setUserPackageCache($user);
        
        return $this->userRedPacket->store($user, $randCoin, $info, CommonEnum::ENABLE);
    }

}
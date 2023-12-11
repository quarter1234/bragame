<?php
namespace App\Services;

use App\Helper\UserHelper;
use App\Repositories\CoinLogRepository;
use App\Repositories\DPgGameBetsRepository;
use App\Repositories\DUserDrawRepository;
use App\Repositories\DUserRechargeRepository;

class MemberService
{
    private $rechargeRepo;
    private $drawRepo;
    private $pgBetsRepo;
    private $coinlogRepo;

    public function __construct(
        DUserRechargeRepository $rechargeRepo, 
        DUserDrawRepository $drawRepo,
        DPgGameBetsRepository $pgBetsRepo,
        CoinLogRepository $coinlogRepo
        )
    {
        $this->rechargeRepo = $rechargeRepo;
        $this->drawRepo = $drawRepo;
        $this->pgBetsRepo = $pgBetsRepo;
        $this->coinlogRepo = $coinlogRepo;
    }

    public function getVipInfo($user) :array
    {
        $res = UserHelper::getVipInfo($user);

        foreach ($res['vipList'] as &$item) {
            $item['rewards_format'] = explode(':', $item['rewards'])[1];
            $item['weeklybonus_format'] = explode(':', $item['weeklybonus'])[1];
            $item['monthlybonus_foramt'] = explode(':', $item['monthlybonus'])[1];
        }

        $res['user'] = $user;

        return $res;
    }

    public function getRechargeList($user)
    {
        $dateTime = $this->getWhereTime(4);
        return $this->rechargeRepo->getRecharges($user, $dateTime['startTime'], $dateTime['endTime']);
    }

    public function getDrawList($user)
    {
        $dateTime = $this->getWhereTime(4);
        return $this->drawRepo->getDraws($user, $dateTime['startTime'], $dateTime['endTime']);
    }

    public function getPgBetsList($user)
    {
        $dateTime = $this->getWhereTime(4);
        return $this->coinlogRepo->getPgBets($user, $dateTime['startTime'], $dateTime['endTime']);
    }

    public function getCoinList($user)
    {
        $dateTime = $this->getWhereTime(4);
        return $this->coinlogRepo->getCoinlog($user, $dateTime['startTime'], $dateTime['endTime']);
    }

    private function getWhereTime(int $type)
    {
        $endTime = time();

        if($type == 1) {
            $startTime = strtotime(date('Y-m-d', time()));  // 今天
        } elseif ($type == 2) {
            $startTime = strtotime(date("Y-m-d",strtotime("-1 day"))); // 昨天
        } elseif ($type == 3) {
            $startTime = strtotime(date("Y-m-d",strtotime("-7 day"))); // 七天
        } elseif ($type == 4) {
            $startTime = strtotime(date("Y-m-d",strtotime("-30 day"))); // 30天
        }

        return ['startTime' => $startTime, 'endTime' => $endTime];
    }
}
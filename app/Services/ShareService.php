<?php
namespace App\Services;

use App\Common\Enum\CommonEnum;
use App\Repositories\DCommissionRepository;
use App\Repositories\DUserInviteRepository;
use App\Repositories\DUserRechargeRepository;
use App\Repositories\DUserTreeRepository;
use Illuminate\Support\Facades\Cache;

class ShareService
{
    private $inviteRepo;
    private $commissionRepo;
    private $rechargeRepo;
    private $treeRepo;

    public function __construct(
        DUserInviteRepository $inviteRepo,
        DCommissionRepository $commissionRepo,
        DUserRechargeRepository $rechargeRepo,
        DUserTreeRepository $treeRepo
    )
    {
        $this->inviteRepo  = $inviteRepo;
        $this->commissionRepo = $commissionRepo;
        $this->rechargeRepo = $rechargeRepo;
        $this->treeRepo = $treeRepo;
    }

    /**
     * 获取分享数据
     * @param mixed $user
     * @return mixed
     */
    public function getShareData($user)
    {
        $data = [];
        $data['link'] = route('mobile.index', ['code' => $user['code']]);
        $data['user'] = $user;
        $data['agent'] = $this->getAgentCacheData($user);
        $data['invite'] = $this->getInviteCacheTotal($user);
        
        return $data;
    }

    
    public function getInviteCacheList($user, $page)
    {
        $cacheKey = "share:invite:list:". $user->uid. '_' . $page;
        return Cache::remember($cacheKey, CommonEnum::CACHE_SHORT_TIME, function () use($user, $page) {
           return $this->getInviteList($user);
        });
    }

    

    public function getInviteCacheTotal($user)
    {
        $cacheKey = "share:invite:total:". $user->uid;
        return Cache::remember($cacheKey, CommonEnum::CACHE_SHORT_TIME, function () use($user) {
           return $this-> getInviteTotal($user);
        });
    }

    public function getInviteList($user)
    {
        $pages = $this->treeRepo->getTree($user->uid, [1,2])->toArray();
        foreach ($pages['data'] as &$item) {
            $item['descendant']['playername'] = hideString($item['descendant']['playername'], 2,3);
            $item['descendant']['create_time'] = date('Y-m-d H:i:s', $item['descendant']['create_time']);
        }
        
        return $pages;
    }

    public function getInviteTotal($user)
    {
        $data = [];
        $data['one_grade_count'] = $this->treeRepo->getTreeCount($user->uid, [1]);
        $data['two_grade_count'] = $this->treeRepo->getTreeCount($user->uid, [2]);
        return $data;
    }

    /**
     * 缓存统计数据
     * @param [type] $user
     * @return mixed
     */
    public function getAgentCacheData($user)
    {
        $cacheKey = "share:agent:total:". $user->uid;
        return Cache::remember($cacheKey, CommonEnum::CACHE_SHORT_TIME, function () use($user) {
           return $this->getAgentData($user);
        });
    }

    public function getAgentData($user)
    {
        $data = [];
        $endTime = time();
        $today = strtotime(date('Y-m-d', time()));
        $yesterday = strtotime(date("Y-m-d",strtotime("-1 day")));
        $week = strtotime(date("Y-m-d",strtotime("-7 day")));
        $month = strtotime(date("Y-m-d",strtotime("-30 day")));
        $year = strtotime(date("Y-m-d",strtotime("-365 day")));

        $data['today'] = $this->oneGradeName($user->uid, $today, $endTime);
        $data['yesterday'] = $this->oneGradeName($user->uid, $yesterday, $endTime);
        $data['week'] = $this->oneGradeName($user->uid, $week, $endTime);
        $data['month'] = $this->oneGradeName($user->uid, $month, $endTime);
        $data['year'] = $this->oneGradeName($user->uid, $year, $endTime);

        return $data;
    }

    /**
     * 获取统计数据
     * @param [type] $uid
     * @param [type] $startTime
     * @param [type] $endTime
     * @return  array
     */ 
    public function oneGradeName($uid, $startTime, $endTime) :array
    {
        $data = [];
       
        $oneGradeUids = $this->inviteRepo->inviteByUidByTime([$uid], $startTime, $endTime);
        $data['oneGradeInviteNum'] = count($oneGradeUids);

        $data['twoGradeInviteNum'] = 0;
        $data['oneTbetcoin'] = 0;
        $data['twoTbetcoin'] = 0;
        $data['oneRechargeAmount'] = 0;
        $data['twoRechargeAmount'] = 0;
        $data['oneFirstRecharge'] = 0;
        $data['twoFirstRecharge'] = 0;

        if($data['oneGradeInviteNum'] > 0) {
            $twoGradeUids =$this->inviteRepo->inviteByUidByTime($oneGradeUids, $startTime, $endTime);
            $data['twoGradeInviteNum'] = count($oneGradeUids);
            $data['oneTbetcoin'] = $this->commissionRepo->getOneTotalBetCoin($uid, $startTime, $endTime); // 下注
            $data['twoTbetcoin'] = $this->commissionRepo->getTwoTotalBetCoin($uid, $startTime, $endTime); // 下注
            $data['oneRechargeAmount'] =  $this->rechargeRepo->getRechargeAmount($oneGradeUids, $startTime, $endTime); // 充值订单 
            $data['twoRechargeAmount'] = $this->rechargeRepo->getRechargeAmount($twoGradeUids, $startTime, $endTime); // 充值订单 
            $data['oneFirstRecharge'] = $this->rechargeRepo->getFirstPayNum($oneGradeUids, $startTime, $endTime); // 首充
            $data['twoFirstRecharge'] = $this->rechargeRepo->getFirstPayNum($twoGradeUids, $startTime, $endTime); // 首充
        }
        
        return $data;
    }

}
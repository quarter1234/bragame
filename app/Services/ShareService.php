<?php
namespace App\Services;

use App\Common\Enum\CommonEnum;
use App\Helper\SystemConfigHelper;
use App\Repositories\BoxAwardRepository;
use App\Repositories\DCommissionRepository;
use App\Repositories\DUserInviteRepository;
use App\Repositories\DUserRechargeRepository;
use App\Repositories\DUserTreeRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ShareService
{
    private $inviteRepo;
    private $commissionRepo;
    private $rechargeRepo;
    private $treeRepo;
    private $boxAwardRepo;

    public function __construct(
        DUserInviteRepository $inviteRepo,
        DCommissionRepository $commissionRepo,
        DUserRechargeRepository $rechargeRepo,
        DUserTreeRepository $treeRepo,
        BoxAwardRepository $boxAwardRepo
    )
    {
        $this->inviteRepo  = $inviteRepo;
        $this->commissionRepo = $commissionRepo;
        $this->rechargeRepo = $rechargeRepo;
        $this->treeRepo = $treeRepo;
        $this->boxAwardRepo = $boxAwardRepo;
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
        // $cacheKey = "share:invite:list:". $user->uid. '_' . $page;
        // return Cache::remember($cacheKey, CommonEnum::CACHE_SHORT_TIME, function () use($user, $page) {
           return $this->getInviteList($user);
        // });
    }



    public function getInviteCacheTotal($user)
    {
        // $cacheKey = "share:invite:total:". $user->uid;
        // return Cache::remember($cacheKey, CommonEnum::CACHE_SHORT_TIME, function () use($user) {
           return $this-> getInviteTotal($user);
        // });
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
    //    $cacheKey = "share:agent:total:". $user->uid;
    //    return Cache::remember($cacheKey, CommonEnum::CACHE_SHORT_TIME, function () use($user) {
    //       return $this->getAgentData($user);
    //    });

       return $this->getAgentData($user);
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

        $data['today'] = $this->dataCommon($user->uid, $today, $endTime);
        $data['yesterday'] = $this->dataCommon($user->uid, $yesterday, $endTime);
        $data['week'] = $this->dataCommon($user->uid, $week, $endTime);
        $data['month'] = $this->dataCommon($user->uid, $month, $endTime);
        $data['year'] = $this->dataCommon($user->uid, $year, $endTime);

        return $data;
    }

    /**
     * 获取统计数据
     * @param [type] $uid
     * @param [type] $startTime
     * @param [type] $endTime
     * @return  array
     */
    private function dataCommon($uid, $startTime, $endTime) :array
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
            $data['twoGradeInviteNum'] = count($twoGradeUids);
            $data['oneTbetcoin'] = $this->commissionRepo->getOneTotalBetCoin($uid, $startTime, $endTime); // 下注
            $data['twoTbetcoin'] = $this->commissionRepo->getTwoTotalBetCoin($uid, $startTime, $endTime); // 下注
            $data['oneRechargeAmount'] =  $this->rechargeRepo->getRechargeAmount($oneGradeUids, $startTime, $endTime); // 充值订单
            $data['twoRechargeAmount'] = $this->rechargeRepo->getRechargeAmount($twoGradeUids, $startTime, $endTime); // 充值订单

            $data['oneFirstRecharge'] = $this->getFirstRecharge($uid, $startTime, $endTime);
            $data['twoFirstRecharge'] = $this->getSeconRecharge($oneGradeUids, $startTime, $endTime);
        }

        return $data;
    }

    private function getFirstRecharge($uid, $startTime, $endTime)
    {
//        $oneFirstRecharge = $this->boxAwardRepo->getBoxAwardManNum($uid, date('Y-m-d', $startTime), date('Y-m-d', $endTime));// 宝箱数量
//        return $oneFirstRecharge;
        $list = $this->inviteRepo->getPayUserCount($uid, $startTime, $endTime);
        $oneFirstRecharge = $list->count();

//        $config = SystemConfigHelper::getByKey('box_award');
//        if($oneFirstRecharge > 0
//            && $config
//            && isset($config['box']['is_rate'])
//            && $config['box']['is_rate'] > 0
//            && isset($config['box']['box_num_limit'])
//            && $oneFirstRecharge > $config['box']['box_num_limit']) {
//            $oneFirstRecharge = floor($oneFirstRecharge * $config['box']['box_num_rate']);
//        }

        return $oneFirstRecharge;
    }

    private function getSeconRecharge($uids, $startTime, $endTime){
        $result = 0;
//        $userList = $this->inviteRepo->getPayUsers($uid, $startTime, $endTime);
//        if(empty($userList) || $userList->isEmpty()){
//            return $result;
//        }
        $twoList = $this->inviteRepo->getPayUsers($uids, $startTime, $endTime, false);
        return $twoList->count();
    }

    public function getTestFirstRecharge($uid, $startTime, $endTime){
        $oneGradeUids = $this->inviteRepo->inviteByUidByTime([$uid], $startTime, $endTime);
        return $this->getSeconRecharge($oneGradeUids, $startTime, $endTime);
    }
}

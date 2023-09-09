<?php
namespace App\Services;

use App\Cache\SconfigCache;
use App\Common\Enum\CommonEnum;
use App\Common\Lib\Result;
use App\Exceptions\BadRequestException;
use App\Helper\UserHelper;
use App\Repositories\DUserBankRepository;
use App\Repositories\DUserDrawRepository;
use App\Repositories\SPayCfgDrawcomRepository;
use App\Repositories\SPayCfgDrawlimitRepository;

class ShopService
{
    private $bankRepo;
    private $drawComRepo;
    private $drawRepo;

    public function __construct(DUserBankRepository $bankRepo, 
        SPayCfgDrawcomRepository $drawComRepo,
        DUserDrawRepository $drawRepo)
    {
        $this->bankRepo  = $bankRepo;
        $this->drawComRepo = $drawComRepo;
        $this->drawRepo = $drawRepo;
    }

    public function checkDoBind($params)
    {
        switch ($params['pix_type']){
            case 1:
            case 2:
            case 3:
                $cres = preg_match("/^\d*$/", $params['account']);
                if(!$cres){
                    throw new BadRequestException(['msg' => 'your input pix must Pure number']);
                }

                if(in_array($params['pix_type'], [1, 3])){ // 必须为11位数字
                    if(strlen($params['account']) != 11){
                        throw new BadRequestException(['msg' => 'pix type CPF or PHONE must 11 pos']);
                    }

                    // 第1位不能是0
                    if($params['pix_type'] == 3 && $params['account'][0] == '0'){
                        throw new BadRequestException(['msg' => 'pix type PHONE first char not 0']);
                    }
                }
                else{ // 必须为14位字符
                    if(strlen($params['account']) != 14){
                        throw new BadRequestException(['msg' => 'pix type CPF or PHONE must 14 pos']);
                    }
                }
                break;
            case 4:
                if(strpos($params['account'], '@') === false){
                    throw new BadRequestException(['msg' => 'please input standard mail']);
                }
                break;
        }
        
        if(isset($params['id_card'])){
            if(strlen($params['id_card']) > 14){
                throw new BadRequestException(['msg' => 'cpf or cnpj Within 14 digits']);
            }
        }
    }

    /**
     * 提现页面数据
     * @param mixed $user
     * @return array
     */
    public function getDrawData($user) :array
    {
        $data = [];
        $userCoins = UserHelper::getUserCoin($user);
        $data['uid']   = $userCoins['uid'];
        $data['dcoin'] = $userCoins['dcoin'];
        $data['coin'] = $userCoins['coin'];

        $svip = $userCoins['svip'];
        if($svip <= 0) {
            $svip = 0;
        }

        $chans = $this->drawComRepo->getDataBySvip($svip);

        $mincoin = 0;
        $maxcoin = 0;
        foreach($chans as $row) {
            if($mincoin == 0) {
                $mincoin = $row['mincoin'];
            } else {
                if($row['mincoin'] <= $mincoin) {
                    $mincoin = intval($row['mincoin']);
                }
            }

            if($maxcoin == 0) {
                $maxcoin = $row['maxcoin'];
            } else {
                if($row['maxcoin'] > $maxcoin) {
                    $maxcoin = intval($row['maxcoin']);
                }
            }
        }

        $data['mincoin'] = $mincoin; //最低
        $data['maxcoin'] = $maxcoin; //最高

        return $data;
    }

    public function getBankInfoByAccount($account)
    {
        return $this->bankRepo->getInfoByAccount($account);
    }

    public function getBanksByUid(int $uid)
    {
        return $this->bankRepo->getBanksByUid($uid);
    }

    public function getBankInfoByUid(int $uid)
    {
        return $this->bankRepo->getBankInfoByUid($uid);
    }

    public function getUserBankInfo(int $bankId, int $uid)
    {
        return $this->bankRepo->getUserBankInfo($bankId, $uid);
    }

    public function getUserAllCoin(int $uid)
    {
        return $this->drawRepo->getUserAllCoin($uid);
    }

    public function getWaitDealCount(int $uid) 
    {
        return $this->drawRepo->getWaitDealCount($uid);
    }

    public function getChansBySvip($svip)
    {
        return $this->drawComRepo->getDataBySvip($svip);
    }

    public function getFirDrawcom()
    {
        return $this->drawComRepo->getEnFirstData();
    }
    

    public function isNeedCardId()
    {
        $needPlat = [
            'cashpay',
        ];
        $collection = $this->drawComRepo->getAllData();
        foreach($collection as $item){
            if(in_array($item->title, $needPlat)){
                return true;
            }
        }

        return false;
    }

    //获取提现限制
    public function getLimitInfo(int $uid) {
        $mincoin = 0;
        $maxcoin = 10000;
        $times = -1;
        $daycoin = -1;
        $totaltimes =  -1;
        $totalcoin = -1;
        $interval = 0;
        
        $userinfo = UserHelper::getUserByUid($uid);
        $limitRepo = app()->make(SPayCfgDrawlimitRepository::class);
        $datalist = $limitRepo->getDataBySvip(false, $userinfo['svip']);
        
        if(!empty($datalist)) {
            foreach($datalist as $row) {
            //    if($mincoin == 0) {
            //        $mincoin = $row['mincoin'];
            //    }
            //    if($row['mincoin'] < $mincoin) {
            //        $mincoin = intval($row['mincoin']);
            //    }
            //    if($row['maxcoin'] > $maxcoin) {
            //        $maxcoin = intval($row['maxcoin']);
            //    }
                if($row['times'] > $times) {
                    $times = intval($row['times']);
                }
                if($row['interval'] > $interval) {
                    $interval = intval($row['interval']);
                }
                if($row['daycoin'] > $daycoin) {
                    $daycoin = $row['daycoin'];
                }
                if($row['totaltimes'] > $totaltimes) {
                    $totaltimes = $row['totaltimes'];
                }
                if($row['totalcoin'] > $totalcoin) {
                    $totalcoin = $row['totalcoin'];
                }

                break;
            }
        }
        return [
            'mincoin' => $mincoin,
            'maxcoin' => $maxcoin,
            'times' => $times,
            'interval' => $interval,
            'daycoin' => $daycoin, //当天最大金额
            'totaltimes' => $totaltimes, //总提现次数
            'totalcoin' => $totalcoin, //总提现金额
        ];
    }

    public function getTodayDrawTimes(int $uid, $isToday = true)
    {
        return $this->drawRepo->getTodayTimes($uid, $isToday);
    }

    public function getTodayDrawCoin(int $uid, $isToday = true)
    {
        return $this->drawRepo->getTodayAllCoin($uid, $isToday);
    }

    public function getLastDrawInfo(int $uid)
    {
        return $this->drawRepo->getLastInfo($uid);
    }

    public function storeUserBank($params, $user)
    {
        $data = [
            'uid' => $user->uid,
            'account' => $params['account'],
            'cat' => 1,
            'username' => $params['username'],
            'create_time' => time(),
            'card_type' => CommonEnum::ENABLE,
            'status' => 2,
            'phone' => $user->phone,
            'pix_type' => $params['pix_type'],
            'cardid' => isset($params['id_card']) ? $params['id_card'] : '',
        ];

        $user->kyc = 1;
        $user->save();
        return $this->bankRepo->create($data);
    }

    public function checkIsPlayer($user, $dcoin)
    {
        if($user['is_test'] == CommonEnum::ENABLE) { // 测试用户不能提现
            return Result::error('Usuários de teste não podem sacar.');
        }

        if(intval($user['ispayer']) == 0) { //未充值用户不能超过系统最高金额
            $cfg = SconfigCache::getByKey('newuser_no_pay_drawlimit');
            $maxcoin = intval($cfg['v']);
            $haddrawcoin = $this->getUserAllCoin($user->uid);
            
            if($maxcoin > 0 && ($dcoin + $haddrawcoin) > $maxcoin) {
                return Result::error("Withdrawal amount must be less than the maximum withdrawable amount{$maxcoin}.");
            }

            $doingcnt =  $this->getWaitDealCount($user->uid);
            if($doingcnt >= 1) {
                return Result::error('You have a withdrawal order under review, please wait patiently.');
            }
        }
    }

    public function checkLimit($user, $dcoin)
    {
        $limit = $this->getLimitInfo($user['uid']);

        $todaytimes = $this->getTodayDrawTimes($user['uid']); //today max times
        if($limit['times'] >0 && $todaytimes + 1 > $limit['times']) {
            return Result::error("Today's withdrawal times has reached the limit({$limit['times']})");
        }

        $todaycoin = $this->getTodayDrawCoin($user['uid']);
        if($limit['daycoin'] >0 && $todaycoin + $dcoin >= $limit['daycoin']) {
            return Result::error("Today's withdrawal amount has reached the limit({$limit['daycoin']})");
        }

        $alltimes = $this->getTodayDrawTimes($user['uid'], false); //total max times
        if($limit['totaltimes'] >0 && $alltimes + 1 > $limit['totaltimes']) {
            return Result::error("Withdrawal times has reached the limit times({$limit['totaltimes']})");
        }

        $allcoin = $this->getTodayDrawCoin($user['uid'], false);
        if($limit['totalcoin'] >0 && $allcoin + $dcoin >= $limit['totalcoin']) {
            return Result::error("Withdrawal Amount has reached the limit coin({$limit['totalcoin']})");
        }

        $lastDrawInfo = $this->getLastDrawInfo($user['uid']);
        if($lastDrawInfo && $limit['interval'] > 0 && $lastDrawInfo['create_time'] > (time() - $limit['interval']*60)) { // 间隔时间
            return Result::error('Withdrawals too frequently.');
        }
    }
}
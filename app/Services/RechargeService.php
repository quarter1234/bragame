<?php
namespace App\Services;

use App\Models\DUserRecharge;
use App\Repositories\DUserRechargeRepository;
use App\Repositories\SPayCfgChannelRepository;
use App\Repositories\SPayGroupRepository;
use Illuminate\Support\Facades\DB;

class RechargeService
{
    private $payGroupRepo;
    private $channelRepo;
    private $rechargeRepo;

    private const DICTS = [ // 交易科目显示的内容
        1 => 'paytm',
        2 => 'googlepay',
        3 => 'paytm',
        4 => 'phonePe',
        5 => 'upi',
        6 => 'usdt',
        7 => 'bank',
        8 => 'onlinepay',
        9 => 'addcard',
        10 => 'wallets',
        11 => 'netbank',
    ];

    public function __construct(
        SPayGroupRepository $payGroupRepo, 
        SPayCfgChannelRepository $channelRepo,
        DUserRechargeRepository $rechargeRepo
    )
    {
        $this->payGroupRepo  = $payGroupRepo;
        $this->channelRepo = $channelRepo;
        $this->rechargeRepo = $rechargeRepo;
    }

    public function getChannels($rechargeCoin, $svip=0, $groupid=0, $coin=0, $user)
    {
        if($svip <= 0) {
            $svip = 0;
        }

        $groups = $this->getDataBySvip($svip , $groupid);
        if(!$groups) {
            return [];
        }

        return $this->handleGroup($rechargeCoin, $coin, $groups, $user, $svip);
    }

    public function handleGroup($rechargeCoin, $coin, $groups, $user, $svip)
    {
        $orders = $this->getOrdersByGroup($groups, $user);
        $totalOrder = $orders['totalOrder']; //总订单数
        $ordersToday = $orders['todayOrder']; //今日订单数
        $datalist = [];

        foreach ($groups as $row) {
            $groupItem = [
                'id' => $row['id'],
                'title'   => $row['title'],
                'alias_name' => $row['alias_name'],
                'icon'    => $row['icon'],//Config::get('pay.img_url') . $row['icon'],
                'subtype' => isset($dicts[$row['subject']]) ? self::DICTS[$row['subject']] : '',
                'mincoin' => 0, //最小
                'maxcoin' => 0, //最大
                'disrate' => 0, //优惠比例
                'discoin' => 0,
                'type' => 0,
                'pages' => [],
            ];

            // 根据支付分组和vip来获得支付通道
            $isFirstPay = 1;
            $userRechCount = DUserRecharge::where('uid', $user->uid)->where('status', 2)->count();
            if($userRechCount > 0){
                $isFirstPay = 0;
            }
            
            $res = $this->channelRepo->getListByGroup($row['id'], $svip, $isFirstPay);
            
            if(!empty($res)) {
                foreach($res as $val) {
                    if($rechargeCoin > 0 && ($rechargeCoin < $val['mincoin'] || $rechargeCoin > $val['maxcoin'])) {
                        continue;
                    }

                    $item = [
                        'id'    => $val['id'],
                        'title' => $val['title'],
                        'pay_view_coin' => $val['pay_view_coin'],
                        'type'  => $row['category'],
                        'banktype' => 0,
                        'mincoin' => $val['mincoin'],
                        'maxcoin' => $val['maxcoin'],
                        // 每次优惠比例 * 100 用于展示
                        'disrate' => number_format($val['disrate']*100, 2),
                        'discoin' => 0, // 每次优惠固定金额
                        'rate' => $val['disrate'],
                        'sendcoin' => 0, // 赠送金额
                        'is_first_pay' => 0,
                    ];
                    
                    if(isset($val['discoin']) && $val['discoin'] > 0) { // 每次优惠固定金额
                        $item['discoin'] = $val['discoin'];
                        $item['disrate'] = 0;
                        $item['sendcoin'] = $val['discoin'];
                        if($coin > 0) {
                            $item['rate'] = number_format($item['discoin']/$coin, 2);
                        }
                    }
                    else if(isset($val['disrate']) && $val['disrate'] > 0){ // 每次优惠比例金额
                        $item['discoin'] = 0;
                        $item['sendcoin'] = roundCoin($val['disrate'] * $val['pay_view_coin']);
                    }

                    $orderKey = $row['id'].'_'.$val['id'].'_1';
                    if(!isset($ordersToday[$orderKey])) { // 判断今天是否有充值过
                        if($val['fd_dcoin'] > 0) { // 当天首充优惠金额
                            $item['discoin'] = $val['fd_dcoin'];
                            $item['sendcoin'] = $val['fd_dcoin'];
                            $item['disrate'] = 0;
                            if($coin > 0) {
                                $item['rate'] = number_format($item['discoin']/$coin, 2);
                            }
                        }
                        if($val['fd_drate'] > 0) { // 当天首充优惠比例
                            $item['disrate'] = number_format($val['fd_drate']*100, 2);
                            $item['rate'] = $val['fd_drate'];
                            $item['sendcoin'] = roundCoin($val['fd_drate'] * $val['pay_view_coin']);
                            $item['discoin'] = 0;
                        }
                    }
                    
                    //首次
                    if(!isset($totalOrder[$orderKey])) { // 判断是否有充值过
                        if($val['f_dcoin'] > 0) { // 首次充值优惠金额
                            $item['discoin'] = $val['f_dcoin'];
                            $item['sendcoin'] = $val['f_dcoin'];
                            $item['disrate'] = 0;
                            if($coin > 0) {
                                $item['rate'] = number_format($item['discoin']/$coin, 2);
                            }

                            $item['is_first_pay'] = 1;
                        }
                        if($val['f_drate'] > 0) { // 首次充值优惠比例
                            $item['disrate'] = number_format($val['f_drate']*100, 2);
                            $item['rate'] = $val['f_drate'];
                            $item['discoin'] = 0;
                            $item['sendcoin'] = roundCoin($val['f_drate'] * $val['pay_view_coin']);
                            $item['is_first_pay'] = 1;
                        }
                    }
                    
                    // 设置最低充值金额
                    if($groupItem['mincoin'] == 0) {
                        if(isset($item['mincoin']) && $item['mincoin']) {
                            $groupItem['mincoin'] = $item['mincoin'];
                        }
                    } else {
                        if(isset($item['mincoin']) && ($item['mincoin'] < $groupItem['mincoin'])) {
                            $groupItem['mincoin'] = $item['mincoin'];
                        }
                    }

                    // 设置最高充值金额
                    if($groupItem['maxcoin'] == 0) {
                        if(isset($item['maxcoin']) && $item['maxcoin']) {
                            $groupItem['maxcoin'] = $item['maxcoin'];
                        }
                    } else {
                        if(isset($item['maxcoin']) && ($item['maxcoin'] < $groupItem['maxcoin'])) {
                            $groupItem['maxcoin'] = $item['maxcoin'];
                        }
                    }
                   
                    // 设置最大的优惠比例
                    if($groupItem['disrate'] == 0) {
                        if(isset($item['disrate']) && $item['disrate'] > 0) {
                            $groupItem['disrate'] = $item['disrate'];
                        }
                    } else {
                        if(isset($item['disrate']) && ($item['disrate'] > $groupItem['disrate'])) {
                            $groupItem['disrate'] = $item['disrate'];
                        }
                    }

                    // 设置最大优惠固定金额
                    if($groupItem['discoin'] == 0) {
                        if(isset($item['discoin']) && $item['discoin'] > 0) {
                            $groupItem['discoin'] = $item['discoin'];
                        }
                    } else {
                        if(isset($item['discoin']) && ($item['discoin'] > $groupItem['discoin'])) {
                            $groupItem['discoin'] = $item['discoin'];
                        }
                    }

                    if($groupItem['discoin'] > 0) { // 如果有固定金额优惠，就+号显示
                        $groupItem['discoin'] = intval($groupItem['discoin']);
                        $groupItem['disrate'] = '+'.$groupItem['discoin'];
                    }

                    if($item['disrate'] > 0) { // 如果有优惠比例，就用%显示
                        $item['disrate'] = '+'.$item['disrate'] . '%';
                    }
                    if($item['discoin'] > 0) {
                        $item['discoin'] = intval($item['discoin']);
                        $item['disrate'] = '+'.$item['discoin'];
                    }
                    $groupItem['pages'][] = $item;
                }
            }

            if($groupItem['discoin'] > 0 or $groupItem['disrate'] >0 ){
                $groupItem['disrate'] = '+'.$groupItem['disrate'] . '%';
                if($groupItem['discoin'] && $groupItem['disrate'] == 0) {
                    $groupItem['disrate'] = '+'.$groupItem['discoin'];
                }
            }
            $groupItem['mincoin'] = intval($groupItem['mincoin']);
            $groupItem['maxcoin'] = intval($groupItem['maxcoin']);
            if(count($groupItem['pages']) > 0) {
                $datalist[$row['id']] = $groupItem;
            } 
        }
        
        foreach($datalist as $k=>$v) {
            if($v['discoin'] > 0 && empty($v['disrate'])) {
                $v['disrate'] = $v['discoin'];
                unset($v['discoin']);
            }
            if(count($v['pages']) >= 1) {
                $data[] = $v;
            }
        }
       
        return $data;
    }

    public function getDataBySvip($svip , $id=0) :array
    {
        if($id > 0 ){
            $datalist = $this->payGroupRepo->getInfoById($id);
        } else {
            $datalist = $this->payGroupRepo->getListBySvip($svip);
        }

        return $datalist->toArray();
    }

    protected function getOrdersByGroup($groups=[], $user) {
        if(empty($groups)) {
            return [];
        }
        
        $orders = []; //总订单数
        $ordersToday = []; //今日订单数
        $groupIds = [];

        $groupIds = array_column($groups, 'id');
        $todaytime = strtotime(date('Y-m-d'));

        $alllists = $this->rechargeRepo->getUserRechageByGroups($user, $groupIds);
        foreach($alllists as $row) {
            $orders[$row['groupid'].'_'.$row['channelid'].'_'.$row['category']] = $row['t']; //此分组的订单数 首充
        }

        $toadyLists = $this->rechargeRepo->getUserRechargeToday($todaytime, $user, $groupIds);
        foreach($toadyLists as $row) {
            $ordersToday[$row['groupid'].'_'.$row['channelid'].'_'.$row['category']] = $row['t']; //此分组的当天订单数 当日首充
        }

        return ['totalOrder' => $orders, 'todayOrder' => $ordersToday];
    }

    public function getOrderByOid($orderid)
    {
        if($orderid){
            return $this->rechargeRepo->getRechargeByOrderId($orderid);
        }

        return null;
    }
}
<?php
namespace App\Services;

use App\Common\Enum\CommonEnum;
use App\Facades\Bets;
use App\Helper\LogHelper;
use App\Helper\RewardHelper;
use App\Helper\UserHelper;
use App\Helper\VipHelper;
use App\Models\DUserLoginLog;
use App\Repositories\AgentAwardRepository;
use App\Repositories\BoxAwardRepository;
use App\Repositories\DCommissionRepository;
use App\Repositories\DUserDrawRepository;
use App\Repositories\UserRepository;
use App\Repositories\DUserRechargeRepository;
use App\Common\Enum\GameEnum;
use App\Helper\SystemConfigHelper;
use App\Cache\AllUseGameDrawCache;
use App\Models\CoinLog;
use App\Models\DUserMailNew;
use App\Repositories\DUserBindRepository;
use Illuminate\Support\Facades\Log;

class UserService
{
    private $userRepo;
    private $userRech;
    private $userComm;
    private $userDraw;
    private $userAgentAward;
    private $userBoxAward;

    public function __construct(UserRepository $userRepo,
                                DUserRechargeRepository $userRech,
                                DCommissionRepository $userComm,
                                DUserDrawRepository $userDraw,
                                AgentAwardRepository $userAgentAward,
                                BoxAwardRepository $userBoxAward)
    {
        $this->userRepo  = $userRepo;
        $this->userRech = $userRech;
        $this->userComm = $userComm;
        $this->userDraw = $userDraw;
        $this->userAgentAward = $userAgentAward;
        $this->userBoxAward = $userBoxAward;
    }

    /**
     * 获取用户信息
     * @param  $phone
     * @return mixed
     */
    public function getUserByPhone($phone)
    {
        return $this->userRepo->getUserByPhone($phone);
    }

    public function getRegIpNum(string $ip) :int
    {
        return $this->userRepo->getRegIpNum($ip);
    }

    /**
     * 创建用户
     * @param array $params
     * @return mixed
     */
    public function storeUser(array $params)
    {
        $data = [];
        $data['phone'] = $params['phone'];
        $data['password'] = bcrypt(trim($params['password']));
        $data['playername'] = $params['playername'];
        $data['usericon'] = rand(1,11);
        $data['reg_ip'] = $params['ip'];
        $data['create_time'] = time();
        $data['login_time'] = time();
        $data['login_ip'] = $params['ip'];
        $data['code'] = UserHelper::inviteCode(CommonEnum::NUM_FOUR);
        $data['token'] = UserHelper::token();
        $data['isbindphone'] = CommonEnum::ENABLE;

        return $this->userRepo->storeUser($data);
    }

    public function storeLoginLog($user, $params)
    {
        $data = [];
        $data['uid'] = $user['uid'];
        $data['login_type'] = 1;
        $data['create_time'] = time();
        $data['channel'] = 'android';
        $data['apkversion'] = '';
        $data['resversion'] = '';
        $data['login_level'] = 0;
        $data['login_coin'] = $user['coin'] ?? 0;
        $data['ip'] = $params['ip'];
        $data['resversion'] = '';
        $data['login_ip'] = $params['ip'];

        DUserLoginLog::create($data);
    }

    /**
     * 更新用户的提现钱包
     * @param $user
     * @param $coin
     * @param $alterCoin
     */
    public function upUserGameDraw($user, $coin, $alterCoin){
        $gamedraw = $user->gamedraw;
        $alterCoin = abs($alterCoin);
        if(($coin - $gamedraw) < $alterCoin){
            $leftAlterCoin = $alterCoin - ($coin - $gamedraw);
            $leftAlterCoin = -1 * $leftAlterCoin;
            if(($gamedraw + $leftAlterCoin) < 0){
                $leftAlterCoin = -$gamedraw;
            }

            // TODO redis  扣掉gamedraw
            $user->gamedraw += $leftAlterCoin;
        }
    }


    public function updateGameDrawInDraw($user, $altercoin){
        $gameDraw = $user['gamedraw'];
        if(($gameDraw + $altercoin) < 0){
            $altercoin = -$gameDraw;
        }

        // TODO redis缓存
        $user['gamedraw'] = $user['gamedraw'] + $altercoin;
        $user->save(); // -- 及时保存
    }

    /**
     * 修改金额
     * @param $user
     * @param $altercoin
     * @param $type 奖励类型
     * @return array
     */
    public function alterUserCoin($user, $altercoin, $type){
        $beforecoin = $user->coin;
        $aftercoin = doubleAdd($beforecoin, $altercoin);
        if($aftercoin < 0){
            $aftercoin = 0;
        }

        $user->coin = $aftercoin;
        $altercoin = abs($altercoin);
        if($type == GameEnum::PDEFINE['ALTERCOINTAG']['BET']){ // 下注
            $setIsAllUseDraw = AllUseGameDrawCache::rememberUseDraw($user, $beforecoin);
            if($setIsAllUseDraw == 2){
                $user->totalbet += $altercoin;
                $user->match_bets += $altercoin;
            }
            $this->upUserGameDraw($user, $beforecoin, -$altercoin);
        }
        else if($type == GameEnum::PDEFINE['ALTERCOINTAG']['WIN']){ // 赢分
            $user->totalwin += $altercoin;
        }
        else if($type == GameEnum::PDEFINE['ALTERCOINTAG']['SHOP_RECHARGE']){ // 充值到账
            $user->totalrecharge += $altercoin;
        }
        else if($type == GameEnum::PDEFINE['ALTERCOINTAG']['DOWN'] || $type == GameEnum::PDEFINE['ALTERCOINTAG']['DOWNRETURN']){ // 后台下分和拒绝提现
            if($type == GameEnum::PDEFINE['ALTERCOINTAG']['DOWNRETURN']){ // 拒绝提现
                $user->totaldraw = $user->totaldraw - $altercoin;
            }
            else{ // --后台下分
                $user->totaldraw = $user->totaldraw + $altercoin;
                $this->upUserGameDraw($user, $beforecoin, -$altercoin);
            }
        }

        $user->save(); // -- 及时保存
        return [$beforecoin, $aftercoin];
    }

    public function orderAsynCallback($orderid){
        $order = $this->userRech->getRechargeByOrderId($orderid);
        if(!$order){
            return GameEnum::PDEFINE['RET']['ERROR']['ORDER_PAID_ORDER_NOT_FOUND'];
        }

        if($order['status'] == 2){ // --已经支付成功的订单
            return GameEnum::PDEFINE['RET']['SUCCESS'];
        }

        $uid = $order['uid'];
        $user = UserHelper::getUserByUid($uid);
        if(!$user){
            return GameEnum::PDEFINE['RET']['ERROR']['PLAYER_NOT_FOUND'];
        }
        $sendcoin = 0;
        $sendArr = [0, 0, 0];
        if($order['discoin'] > 0){ // --直接赠送固定额度
            $sendArr = explode(":", $order['rate']);
            $sendcoin = $order['discoin'];
        }

        if($order['disrate'] > 0){ // --按比例赠送
            $sendcoin = roundCoin($order['disrate'] * $order['count']); // --赠送的金币数
            $sendArr = explode(":", $order['rate']);
            foreach($sendArr as $i => $rate){
                $sendArr[$i] = roundCoin($sendcoin * $rate);
            }
        }

        $totalcoin = $order['count']; // --金币
        $rewardsType = GameEnum::PDEFINE['ALTERCOINTAG']['SHOP_RECHARGE'];
        $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['STORE_BUY'];
        $alterlog = "订单到账";
        RewardHelper::alterCoinLog($user, $totalcoin, $rewardsType, $gameId, $alterlog, 0, $order['id']);
        // 赠送金额
        RewardHelper::addCoinByRate($uid, $sendcoin, $sendArr, GameEnum::PDEFINE['TYPE']['SOURCE']['BUY'], GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['STORE_SEND'], $orderid, true, $order['id']);
        $isfirst = 1; // --首次充值
        $rechargeCount = $this->userRech->getUserRechargeNum($uid);
        if($rechargeCount > 0){
            $isfirst = 0;
        }

        if($isfirst){
            Bets::addUserBetMatch($uid, $orderid, $totalcoin, 1);
        }
        else{
            Bets::addUserBetMatch($uid, $orderid, $totalcoin, 5);
        }

        $backcoin = $sendcoin + $totalcoin; // 赠送的金币数 + 订单的金额
        $nowtime = time();
        $rechUpData = [
            'status' => 2,
            'sendcoin' => $sendcoin,
            'backcoin' => $backcoin,
            'pay_time' => $nowtime,
            'isfirst' => $isfirst,
        ];
        $this->userRech->upUserRecharge($orderid, $rechUpData); // 改变订单状态
        // -- 添加上级奖励
        RewardHelper::addSuperiorRewards($uid, GameEnum::PDEFINE['TYPE']['SOURCE']['BUY'], $totalcoin);
        $inviteConfig = SystemConfigHelper::getByKey('invite');
        if($inviteConfig
            && $inviteConfig['invite']
            && !empty($inviteConfig['invite']['rtype'])
            && $inviteConfig['invite']['rtype'] == 1){ // --充值的时候返注册奖励
            $count = $this->userComm->getCommByUserTypeNum($uid, 1);
            if(empty($count)){ // 未给返佣给上级 给注册奖励
                RewardHelper::addSuperiorRewards($uid, GameEnum::PDEFINE['TYPE']['SOURCE']['REG']);
            }
        }

        VipHelper::useVipDiamond($uid, $totalcoin);
        $user['ispayer'] = 1;
        $user->save();
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 拒绝提现
     * @param $uid
     * @param $id
     */
    private function _rejectDraw($user, $draw){
        $addCoin = $draw['coin'];
        $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['DRAW_RETURN'];
        $title = "拒绝提现:" . $addCoin;
        RewardHelper::alterCoinLog($user, $addCoin, GameEnum::PDEFINE['ALTERCOINTAG']['DOWNRETURN'], $gameId, $title, 0, $draw['id']);
        $this->updateGameDrawInDraw($user, $addCoin);
        $this->userDraw->upDraw($draw['id'], ['status' => 3]);
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 提现审核通过和拒绝
     * @param $uid
     * @param $id
     * @param $status
     * @return mixed
     */
    public function drawverify($uid, $id, $status){
        if($uid && $id && $status){
            $draw = $this->userDraw->find($id);
            if(!$draw){
                return GameEnum::PDEFINE['RET']['ERROR']['DRAW_ERR_BANKINFO'];
            }

            $user = UserHelper::getUserByUid($uid);
            if(!$user){
                return GameEnum::PDEFINE['RET']['ERROR']['DRAW_ERR_BANKINFO'];
            }

            if($status == 2){ // 审核通过(不做处理)
               // 不需要做任何处理
            }
            else{ // --拒绝提现
                if($draw['status'] != 3){
                    return $this->_rejectDraw($user, $draw);
                }
            }
        }

        return GameEnum::PDEFINE['RET']['ERROR']['DRAW_ERR_BANKINFO'];
    }

    /**
     * 后台上下分接口
     * @param $uid
     * @param $coin
     * @return mixed
     */
    public function apiAddCoin($uid, $coin){
        $user = UserHelper::getUserByUid($uid);
        if(!$user){
            return GameEnum::PDEFINE['RET']['ERROR']['DRAW_ERR_BANKINFO'];
        }

        $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['UP_COIN'];
        $cointype = GameEnum::PDEFINE['ALTERCOINTAG']['UP'];
        $title = "上分:";
        if($coin < 0){
            $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['DOWN_COIN'];
            $cointype = GameEnum::PDEFINE['ALTERCOINTAG']['DOWN'];
            $title = "下分:";
        }

        $title = $title . $coin;
        RewardHelper::alterCoinLog($user, $coin, $cointype, $gameId, $title);
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 发送宝箱和工资奖励
     * @param $awradId
     * @param $act
     * @return mixed
     */
    public function awardAsynUser($awradId, $act){
        $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['BOX_AWRAD'];
        $categoryType = GameEnum::PDEFINE['TYPE']['SOURCE']['BOX_AWARD'];
        $rewardType = GameEnum::PDEFINE['ALTERCOINTAG']['BOX_AWARD'];
        $award = null;
        $title = '';
        if($act == "box"){ // -- 宝箱
            $award = $this->userBoxAward->find($awradId);
            $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['BOX_AWRAD'];
            $categoryType = GameEnum::PDEFINE['TYPE']['SOURCE']['BOX_AWARD'];
            $rewardType = GameEnum::PDEFINE['ALTERCOINTAG']['BOX_AWARD'];
            $title = "宝箱赠送可提:";
        }
        else{
            $award = $this->userAgentAward->find($awradId);
            $gameId = GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['AGENT_WEEK_AWARD'];
            $categoryType = GameEnum::PDEFINE['TYPE']['SOURCE']['WEEK_AWARD'];
            $rewardType = GameEnum::PDEFINE['ALTERCOINTAG']['AGENT_AWARD'];
            $title = "工资赠送可提:";
        }

        if(!$award){
            return GameEnum::PDEFINE['RET']['ERROR']['FUND_NOT_FOUND'];
        }

        if($award['check_status'] > 0){
            return GameEnum::PDEFINE['RET']['SUCCESS'];
        }

        if($award['award_amount'] <= 0){
            return GameEnum::PDEFINE['RET']['SUCCESS'];
        }

        $uid = $award['uid'];
        $user = UserHelper::getUserByUid($uid);
        if(!$user){
            return GameEnum::PDEFINE['RET']['ERROR']['DRAW_ERR_BANKINFO'];
        }

        $title = $title . $award['award_amount'];
        try{
            RewardHelper::alterCoinLog($user, $award['award_amount'], $rewardType, $gameId, $title);
            $this->updateGameDrawInDraw($user, $award['award_amount']);
            LogHelper::addSenddrawLog($uid, $title, $award['award_amount'], $categoryType);
            $award['check_status'] = 1;
            $award->save();
        }
        catch (\Exception $e){
            return GameEnum::PDEFINE['RET']['ERROR']['DRAW_ERR_BANKINFO'];
        }

        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 后台站内信
     * @param $awradId
     * @param $act
     * @return mixed
     */
    public function getAttach($id,$uid)
    {
        $info = DUserMailNew::where('id',$id)->first();
        if(!$info) {
            return GameEnum::PDEFINE['RET']['ERROR']['FUND_NOT_FOUND'];
        }
        if($info->hastake != CommonEnum::UNABLE) {
            return GameEnum::PDEFINE['RET']['ERROR']['FUND_NOT_FOUND'];
        }
        RewardHelper::addCoinByRate($uid, 
                                    $info->attach[1] ?? 0, 
                                    $info->rate, 
                                    GameEnum::PDEFINE['TYPE']['SOURCE']['Mail'], 
                                    GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['MAILATTACH'], 
                                    '', 
                                    false, 
                                    $info['id']);
        $info->hastake = CommonEnum::ENABLE;
        $info->hasread = CommonEnum::ENABLE;
        $info->draw_time = time();
        $info->save();
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 后台站内信
     * @param $awradId
     * @param $act
     * @return mixed
     */
    public function vipreward($uid,$addcoin,$rate,$type)
    {
        if($type == 1){
            $acctype = GameEnum::PDEFINE['ALTERCOINTAG']['WEEK_BONUS'];
            $gameId = GameEnum::PDEFINE['ALTERCOINTAG']['WEEK_BONUS'];
            $start_time = $this->week();
        }else{
            $acctype = GameEnum::PDEFINE['ALTERCOINTAG']['MONTH_BONUS'];
            $gameId = GameEnum::PDEFINE['ALTERCOINTAG']['MONTH_BONUS'];
            $start_time = $this->month();
        }
        $info = CoinLog::where(['uid'=>$uid,'type'=>$acctype])->whereBetween('time', [$start_time[0], $start_time[1]])->first();
        if(!empty($info)) {
            return GameEnum::PDEFINE['RET']['ERROR']['FUND_NOT_FOUND'];
        }
        RewardHelper::addCoinByRate($uid, 
                                    $addcoin, 
                                    $rate, 
                                    $acctype, 
                                    $gameId, 
                                    '', 
                                    false, 
                                    0);
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 每日签到
     * @param $uid
     * @param $id
     */
    public function signin($user, $coin){
        $addCoin = $coin;
        $gameId = GameEnum::PDEFINE['ALTERCOINTAG']['SIGNIN_REWARDS'];
        $title = "每日签到奖励:" . $addCoin;
        RewardHelper::alterCoinLog($user, $addCoin, GameEnum::PDEFINE['ALTERCOINTAG']['SIGNIN_REWARDS'], $gameId, $title, 0);
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }

    /**
     * 注册赠送
     * @param $uid
     * @param $id
     */
    public function regbonus($user, $coin)
    {
        $addCoin = $coin;
        $gameId = GameEnum::PDEFINE['ALTERCOINTAG']['REG_BONUS'];
        $title = "新用户注册奖励:" . $addCoin;
        RewardHelper::alterCoinLog($user, $addCoin, GameEnum::PDEFINE['ALTERCOINTAG']['REG_BONUS'], $gameId, $title, 0);
        return GameEnum::PDEFINE['RET']['SUCCESS'];
    }
    
    /** 
     * 返回本周开始和结束的时间戳 
     * 
     * @return array 
     */  
    public static function week()  
    {  
        $timestamp = time();  
        return [  
            strtotime(date('Y-m-d', strtotime("this week Monday", $timestamp))),  
            strtotime(date('Y-m-d', strtotime("this week Sunday", $timestamp))) + 24 * 3600 - 1  
        ];  
    }  

    /** 
     * 返回本月开始和结束的时间戳 
     * 
     * @return array 
     */  
    public static function month($everyDay = false)  
    {  
        return [  
            mktime(0, 0, 0, date('m'), 1, date('Y')),  
            mktime(23, 59, 59, date('m'), date('t'), date('Y'))  
        ];  
    }  
}

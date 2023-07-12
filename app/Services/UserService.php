<?php
namespace App\Services;

use App\Common\Enum\CommonEnum;
use App\Helper\UserHelper;
use App\Models\DUserLoginLog;
use App\Repositories\UserRepository;
use App\Common\Enum\GameEnum;
use App\Helper\SystemConfigHelper;
use Illuminate\Support\Facades\Redis;

class UserService
{
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo  = $userRepo;
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

    public function setIsAllUseDraw($uid, $beforecoin, $gamedraw){
        $key = "d_user:is_all_draw:" . $uid;
        $isAllUseDraw = Redis::get($key);
        if (!is_null($isAllUseDraw)) {
            $isAllUseDraw = intval($isAllUseDraw);
        }
        else{
            if($beforecoin == $gamedraw){
                $isAllUseDraw = 1;
            }

            Redis::set($key, $isAllUseDraw);
        }

        return $isAllUseDraw;
    }

    /**
     * 修改金额
     * @param $user
     * @param $altercoin
     * @param $type
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
            $setIsAllUseDraw = $this->setIsAllUseDraw($user->id, $beforecoin);
            if(!$setIsAllUseDraw){
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

        $user->save();
        return [$beforecoin, $aftercoin];
    }

    public function addSuperiorRewards($user, $actType, $coin, $rtype, $gameId, $type){
        $rtype = $rtype ?? 1; // 注册返利的开关点, 1:充值时候返， 2:立即绑定就返
        $ispayer = $user->ispayer ?? 0;
        $invitUid = $user->invit_uid ?? 0;


    }

    /**
     * 游戏中下注返佣
     * @param $uid
     * @param $actType
     * @param $coin
     * @param $gameId
     * @param $type
     */
    public function gameRebate($user, $actType, $coin, $gameId, $type){
        $inviteConfig = SystemConfigHelper::getByKey('invite');
        $rebateGamelist = [];
        $str = "";
        if($inviteConfig && $inviteConfig['bet']){
            if($type == 1){
                if($inviteConfig['bet']['gameids']){
                    $str = $inviteConfig['bet']['gameids'] ?? '';
                }
            }
            else if($type == 2){
                if($inviteConfig['bet']['jlgameids']){
                    $str = $inviteConfig['bet']['jlgameids'] ?? '';
                }
            }
            else if($type == 3){
                if($inviteConfig['bet']['pggameids']){
                    $str = $inviteConfig['bet']['pggameids'] ?? '';
                }
            }

            if(!empty($str)){
                $rebateGamelist = explode(",", $str);
            }
        }

        foreach($rebateGamelist as $gid){
            if($gid == $gameId){
                $this->addSuperiorRewards($user, $actType, $coin, 2, $gameId, $type);
                break;
            }
        }
    }
}

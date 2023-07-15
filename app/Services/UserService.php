<?php
namespace App\Services;

use App\Common\Enum\CommonEnum;
use App\Helper\UserHelper;
use App\Models\DUserLoginLog;
use App\Repositories\UserRepository;
use App\Common\Enum\GameEnum;
use App\Helper\SystemConfigHelper;
use App\Cache\AllUseGameDrawCache;

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
        // TODO redis缓存
        $user->save(); // -- 及时保存
        return [$beforecoin, $aftercoin];
    }
}

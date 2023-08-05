<?php
namespace App\Services;

use App\Common\Enum\CommonEnum;
use App\Common\Lib\Result;
use App\Exceptions\BadRequestException;
use App\Helper\UserHelper;
use App\Repositories\DUserBankRepository;
use App\Repositories\SPayCfgDrawcomRepository;

class ShopService
{
    private $bankRepo;
    private $drawComRepo;

    public function __construct(DUserBankRepository $bankRepo, SPayCfgDrawcomRepository $drawComRepo)
    {
        $this->bankRepo  = $bankRepo;
        $this->drawComRepo = $drawComRepo;
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
        ];

        return $this->bankRepo->create($data);
    }
}
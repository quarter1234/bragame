<?php
namespace App\Services;

use App\Cache\UserCache;
use App\Exceptions\BadRequestException;
use App\Helper\GameHelper;

class DisplayService
{
    private $payConfig;

    public function __construct()
    {
        $this->payConfig = config('pay');
    }

    public function getUrl($user, $params)
    {
        
        if($params['act'] == 'pay') {
            return $this->payConfig['payurl'] . '?' . $this->getQuery($user);

        } elseif($params['act'] == 'kyc') {
            return $this->payConfig['kyc'] . '?' . $this->getQuery($user);

        } elseif($params['act'] == 'transaction') {
            return $this->payConfig['transaction'] . '?' . $this->getQuery($user);
            
        } elseif($params['act'] == 'payment') {
            return $this->payConfig['payment'] . '?' . $this->getQuery($user);
            
        }elseif($params['act'] == 'game_url') {
            $url = GameHelper::getPgGameUrl($user, $params['game_code'] ?? '');
            if(!$url) {
                throw new BadRequestException("Game Code Err!");
            }
            return $url;
        }
    }

    public function getQuery($user) :string
    {
        $token = UserCache::getToken($user);
        $query = ['uid' => $user->uid, 'token' => $user['token']];
        return http_build_query($query);
    }


}
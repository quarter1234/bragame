<?php
namespace App\Services;

use App\Cache\UserCache;
use App\Exceptions\BadRequestException;
use App\Helper\GameHelper;
use GuzzleHttp\Client;

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

        } elseif($params['act'] == 'draw') {
            return $this->payConfig['draw'] . '?' . $this->getQuery($user);

        } elseif($params['act'] == 'transaction') {
            return $this->payConfig['transaction'] . '?' . $this->getQuery($user);
            
        } elseif($params['act'] == 'payment') {
            return $this->payConfig['payment'] . '?' . $this->getQuery($user);
            
        }elseif($params['act'] == 'game_url') {
            $url = GameHelper::getPgGameUrl($user, $params['game_code'] ?? '');
            if(!$url) {
                throw new BadRequestException(['msg' => 'PG game url err:'. $params['game_code']]);
            }
            return $url;
        }elseif($params['act'] == 'post_pay') {
            UserCache::getToken($user);

            $client = new Client([
                'verify' => false,
                'timeout' => 30, // Response timeout
                'connect_timeout' => 30, // Connection timeout
                'peer' => false
            ]); //初始化客户端

            $response = $client->post($this->payConfig['post_pay'], [
                'form_params' => [        //参数组
                    'amount' => $params['amount'],
                    'id' => $params['id'],
                    'uid' => $user->uid,
                    'token' => $user['token']
                ],
            ]);

            $body = $response->getBody()->getContents();
            $body = json_decode($body, true);
            return $body['data']['payurl'] ?? '';
        }
    }

    public function getQuery($user) :string
    {
        $token = UserCache::getToken($user);
        $query = ['uid' => $user->uid, 'token' => $user['token']];
        return http_build_query($query);
    }


}
<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\Role;
use App\Models\User;

class UserRepository extends Repository
{
    function model()
    {
        return User::class;
    }

    public function storeUser(array $data)
    {
        return $this->create($data);
    }

    public function getUserByPhone($phone)
    {
        return $this->model()::where('phone', $phone)->first();
    }

    public function getRegIpNum($ip)
    {
        return $this->model()::where('reg_ip', $ip)->count('uid');
    }

    public function getUsers(array $params)
    {
        $orWhere = [];

        if(isset($params['search_key']) && $params['search_key']) {
            $orWhere[] = ['mobile', 'like', '%'.$params['search_key'].'%', 'OR'];
            $orWhere[] = ['name', 'like', '%'.$params['search_key'].'%', 'OR'];
        }

        return $this->model()::where(function ($query) use ($orWhere) {
                $query->orWhere($orWhere);
             })->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }

    public function getRankCoin()
    {
        $list = $this->model()::where('status', CommonEnum::ENABLE)
        // ->where('create_time', '>', 1685180041)//5月份开始
        ->orderBy('coin', 'desc')
        ->take(30)
        ->get();

        $data = [];
        foreach ($list as $item) {
            $tmp = [];
            $tmp['playername'] = hideString($item['playername'], 2,2);
            $tmp['coin'] = $item['coin'];
            $data[] = $tmp;
        }

        return $data;
    }
}
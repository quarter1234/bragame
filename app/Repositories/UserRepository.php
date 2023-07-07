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
}
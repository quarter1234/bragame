<?php
namespace App\Repositories;

use App\Exceptions\RoleNotExistException;
use App\Models\Role;

class RoleRepository extends Repository
{
    function model()
    {
        return Role::class;
    }

    public function store($params)
    {
        $this->create($params);
    }

    public function findByName($name, $guardName = '')
    {
        try {
            if(!$guardName) {
                $guardName = $this->model()::GUARD_NAME;
            }
           
            return $this->model()::findByName($name, $guardName);
        } catch (\Throwable $th) {
            throw new RoleNotExistException(['msg' => '没找到对应角色']);
        }
        
    }
}
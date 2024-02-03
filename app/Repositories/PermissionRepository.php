<?php
namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository extends Repository
{
    function model()
    {
        return Permission::class;
    }

    public function store($params)
    {
        $this->create($params);
    }
}
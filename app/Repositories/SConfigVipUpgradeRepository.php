<?php
namespace App\Repositories;

use App\Models\SConfigVipUpgrade;

class SConfigVipUpgradeRepository extends Repository
{
    function model()
    {
        return SConfigVipUpgrade::class;
    }

    public function getConfigs()
    {
        return $this->model()::orderBy('id', 'asc')->get();
    }
}
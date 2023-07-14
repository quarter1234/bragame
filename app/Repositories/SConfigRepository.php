<?php
namespace App\Repositories;

use App\Models\SConfig;

class SConfigRepository extends Repository
{
    function model()
    {
        return SConfig::class;
    }

    public function getConfigByKey(string $key)
    {
        if($key){
            return $this->model()::where('k', $key)->first();
        }
        
        return null;
    }
}

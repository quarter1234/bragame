<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SConfigPic;

class SConfigPicRepository extends Repository
{
    function model()
    {
        return SConfigPic::class;
    }

    public function getBanners()
    {
        return $this->model()::where('status', CommonEnum::ENABLE)->orderBy('ord', 'asc')->get();
    }
}
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
        return $this->model()::where('status', CommonEnum::ENABLE)->where('url', '<>', 'index_notice')->orderBy('ord', 'asc')->get();
    }

    public function getIndexNotice()
    {
        return $this->model()::where('status', CommonEnum::ENABLE)->where('url', 'index_notice')->orderBy('ord', 'asc')->first();
    }
}
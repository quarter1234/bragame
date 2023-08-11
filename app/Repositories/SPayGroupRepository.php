<?php

namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SPayGroup;

class SPayGroupRepository extends Repository
{
    //
    public function model()
    {
        return SPayGroup::class;
    }

    public function getInfoById($id)
    {
        return $this->model()::where('status', CommonEnum::ENABLE)->where('id', $id)->get();
    }

    public function getListBySvip($svip)
    {
        return $this->model()::where('status', CommonEnum::ENABLE)
        ->where('svip', 'like', '%' . $svip . ',%')
        ->orderBy('ord','asc')
        ->get();
    }
}
<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SNotice;

class SNoticeRepository extends Repository
{
    function model()
    {
        return SNotice::class;
    }

    public function getNotices()
    {
        return $this->model()::where('status', CommonEnum::ENABLE)->select(['id','title', 'img', 'create_time'])->orderBy('ord', 'asc')->get();
    }
}
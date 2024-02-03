<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DUserMailNew;

class DUserMailNewRepository extends Repository
{
    function model()
    {
        return DUserMailNew::class;
    }


    public function getEmails($user)
    {
        return $this->model()::where('uid', $user->uid)
        // ->where('hasread', CommonEnum::UNABLE)
        ->orderBy('id', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }

    public function getEmailInfo($id, $user)
    {
        return $this->model()::where('uid', $user->uid)->where('id', $id)->first();
    }
}
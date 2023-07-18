<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\SConfigCustomer;
use App\Models\SConfigPic;

class SConfigCustomerRepository extends Repository
{
    function model()
    {
        return SConfigCustomer::class;
    }

    public function getCustomers()
    {
        return $this->model()::where('status', CommonEnum::ENABLE)->orderBy('id', 'asc')->get();
    }
}
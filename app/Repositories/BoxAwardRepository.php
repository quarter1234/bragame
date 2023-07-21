<?php
namespace App\Repositories;

use App\Models\DBoxAward;

class BoxAwardRepository extends Repository
{
    //
    public function model()
    {
        return DBoxAward::class;
    }
}

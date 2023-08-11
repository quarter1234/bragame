<?php
namespace App\Repositories;

use App\Models\DUserBind;

class DUserBindRepository extends Repository
{
    function model()
    {
        return DUserBind::class;
    }
}
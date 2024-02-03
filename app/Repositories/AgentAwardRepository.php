<?php
namespace App\Repositories;

use App\Models\DAgentAward;

class AgentAwardRepository extends Repository
{
    //
    public function model()
    {
        return DAgentAward::class;
    }
}

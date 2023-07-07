<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DPgGame;

class DPgGameRepository extends Repository
{
    function model()
    {
        return DPgGame::class;
    }

    public function getGames(array $params)
    {
        return $this->model()::where('platform', $params['platform'])
        ->where('game_status', CommonEnum::ENABLE)
        ->orderBy('sort', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }
}
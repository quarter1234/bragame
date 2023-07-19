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

    public function getGameRecommend(array $params)
    {
        return $this->model()::where('platform', $params['platform'])
        ->where('game_status', CommonEnum::ENABLE)
        ->orderBy('sort', 'desc')
        ->limit(CommonEnum::RECOMMEND_NUM)
        ->get();
    }

    public function getGameFavor($params)
    {
        return $this->model()::where('game_status', CommonEnum::ENABLE)
        ->where('platform', $params['platform'])
        ->orderBy('id', 'desc')
        ->limit(CommonEnum::RECOMMEND_NUM)
        ->get();
        // whereIn('platform', $params['platform'])
        // ->
    }

    public function getPgGameByCode($gameCode){
        return $this->model()::where('game_code', $gameCode)->first();
    }

    public function insert(array $data){
        return  $this->model()::insertGetId($data);
    }
}

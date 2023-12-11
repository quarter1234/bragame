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

    //剔除假PG
    public function getGamestc(array $params)
    {
        $str = array("虎虎生财","十倍金牛","象财神","鼠鼠福福","Slot_fortunerabbit");
        return $this->model()::where('platform', $params['platform'])
        ->where('game_status', CommonEnum::ENABLE)
        ->whereNotIn('game_name', $str)
        ->orderBy('sort', 'desc')
        ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }

    public function getGameslimit(array $params)
    {
        return $this->model()::where('platform', $params['platform'])
        ->where('game_status', CommonEnum::ENABLE)
        ->orderBy('sort', 'desc')
        ->limit(4)
        ->get();
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
        ->limit(6)
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

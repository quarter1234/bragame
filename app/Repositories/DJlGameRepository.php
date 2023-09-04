<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DJlGame;

class DJlGameRepository extends Repository
{
    function model()
    {
        return DJlGame::class;
    }

//    public function insert(array $data){
//        return  $this->model()::insertGetId($data);
//    }

    public function getJlGameByCode($gameCode){
        return $this->model()::where('game_code', $gameCode)->first();
    }

    public function getGames()
    {
        return $this->model()::where('game_status', CommonEnum::ENABLE)
                    ->orderBy('sort', 'desc')
                    ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }
}

<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DPgProGame;

class DPgProGameRepository extends Repository
{
    function model()
    {
        return DPgProGame::class;
    }

//    public function insert(array $data){
//        return  $this->model()::insertGetId($data);
//    }

    public function getPgProGameByCode($gameCode){
        return $this->model()::where('game_code', $gameCode)->first();
    }

    public function getGames()
    {
        return $this->model()::where('game_status', CommonEnum::ENABLE)
                    ->orderBy('sort', 'desc')
                    ->simplePaginate(CommonEnum::DEFAULT_PAGE_NUM);
    }

    public function getGameFavor()
    {
        return $this->model()::where('game_status', CommonEnum::ENABLE)
        ->orderBy('id', 'asc')
        ->limit(6)
        ->get();
    }
}

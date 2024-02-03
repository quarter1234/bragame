<?php
namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use App\Models\DPgGame;
use App\Helper\SystemConfigHelper;
use App\Models\DPgProOhGame;

class DPgGameRepository extends Repository
{
    function model()
    {
        return DPgGame::class;
    }

    function modelProOh(){
        return DPgProOhGame::class;
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
        $str = $this->selectPgprogame();
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
        ->limit(6)
        ->get();
    }

    public function getGameslimitlast(array $params)
    {
        $str = $this->selectPgprogame();
        return $this->model()::where('platform', $params['platform'])
        ->where('game_status', CommonEnum::ENABLE)
        ->whereNotIn('game_name', $str)
        ->orderBy('sort', 'desc')
        ->limit(1)
        ->get();
    }

    /**
     * 假PG，新假PG
     */
    public static function selectPgprogame(){
        $pgstatus = SystemConfigHelper::getByKey('pgstatus');
        if($pgstatus == 1){ //假PG
            $str = CommonEnum::PGPRO;
        }elseif($pgstatus == 2){ //新假PG
            $str = CommonEnum::PGPROOH;
        }
        return $str;
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
        ->orderBy('sort', 'desc')
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

    public function findOh(int $id){
        return $this->modelProOh()::find($id);
    }
}

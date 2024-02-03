<?php

namespace App\Repositories;

use App\Common\Enum\CommonEnum;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

abstract class Repository extends BaseRepository
{
    protected $fields = ['*']; // []

    public function __construct()
    {
        parent::__construct(app());
    }

    public function getModel()
    {
        return DB::table($this->model->getTable());
    }

    public function getInfoByShowId($showId)
    {
        return $this->model()::where('show_id', $showId)->first();
    }
}

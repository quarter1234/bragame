<?php
namespace App\Services;

use App\Helper\UserHelper;
use App\Repositories\DUserMailNewRepository;

class DrawService
{
    private $mailRepo;

    public function __construct(DUserMailNewRepository $mailRepo)
    {
        $this->mailRepo  = $mailRepo;
    }

    public function drawApply(array $params)
    {
        $user = UserHelper::getUserByUid($params['uid']);
    }

    public function getCanDrawCoin($user)
    {
        $canDrawCoin = $user['gamedraw'];
        
    }
}
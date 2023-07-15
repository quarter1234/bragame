<?php
namespace App\Services;

use App\Exceptions\BadRequestException;
use App\Helper\GameHelper;
use App\Repositories\SNoticeRepository;

class DisplayService
{
    private $noticeRepo;

    public function __construct(SNoticeRepository $noticeRepo)
    {
        $this->noticeRepo  = $noticeRepo;
    }

    public function getUrl($user, $params)
    {
        if($params['act'] == 'pay') {
            // return 
        } elseif($params['act'] == 'game_url') {
            $url = GameHelper::getPgGameUrl($user, $params['game_code'] ?? '');
            if(!$url) {
                throw new BadRequestException("Game Code Err!");
            }
            return $url;
        }
    }




}
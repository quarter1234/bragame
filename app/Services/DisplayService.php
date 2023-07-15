<?php
namespace App\Services;

use App\Repositories\SNoticeRepository;

class DisplayService
{
    private $noticeRepo;

    public function __construct(SNoticeRepository $noticeRepo)
    {
        $this->noticeRepo  = $noticeRepo;
    }

    public function getUrl()

}
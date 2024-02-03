<?php
namespace App\Services;

use App\Repositories\SNoticeRepository;

class ActivityService
{
    private $noticeRepo;

    public function __construct(SNoticeRepository $noticeRepo)
    {
        $this->noticeRepo  = $noticeRepo;
    }

    /**
     * 获取活动列表
     * @return mixed
     */
    public function getActivity()
    {
        return $this->noticeRepo->getNotices();
    }

    public function getActivityInfo(int $id)
    {
        return $this->noticeRepo->find($id);
    }
}
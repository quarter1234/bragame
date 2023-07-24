<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\ActivityService;

/**
 * 活动任务相关
 */
class ActivityController extends Controller
{
    private $activityService;

    public function __construct(ActivityService $activityService)
    {
       $this->activityService = $activityService;
    }

    public function index()
    {
        $data = [];
        $data['activity'] = $this->activityService->getActivity();
        
        return view('mobile.activity.index', $data);
    }

    public function show(int $id)
    { 
        $data = [];
        $data['activity'] = $this->activityService->getActivityInfo($id);

        return view('mobile.activity.show', $data);
    }
}
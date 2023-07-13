<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PublicRequest;
use App\Services\IndexService;

class IndexController extends Controller
{
    private $indexService;

    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }

    public function index(PublicRequest $request)
    {
        
        $params = $request->goCheck('index');
        $data = $this->indexService->getIndexData($params);
        
        return view('mobile.index.index', $data);
    }

    public function bannerShow(int $id)
    {
        $data = [];
        $data['banner'] = $this->indexService->bannerInfo($id);
        
        return view('mobile.index.banner_info', $data);
    }
}
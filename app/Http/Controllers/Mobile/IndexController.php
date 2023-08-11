<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\ViewHelper;
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

        return view(ViewHelper::getTemplate('index.index'), $data);
    }

    public function bannerShow(int $id)
    {
        $data = [];
        $data['banner'] = $this->indexService->bannerInfo($id);
        
        return view(ViewHelper::getTemplate('index.banner_info'), $data);
    }
}
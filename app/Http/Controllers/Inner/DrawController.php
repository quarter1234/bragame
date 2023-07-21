<?php

namespace App\Http\Controllers\Inner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inner\DrawRequest;
use App\Services\DrawService;

class DrawController extends Controller
{
    private $drawService;

    public function __construct(DrawService $drawService)
    {
        $this->drawService = $drawService;
    }

    public function drawApply(DrawRequest $drawRequest)
    {
        $params = $drawRequest->goCheck('drawApply');
        // if($params[''])
        $this->drawService->drawApply($params);

        print_r($params);die();
    }

}
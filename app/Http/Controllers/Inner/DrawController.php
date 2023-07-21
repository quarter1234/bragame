<?php

namespace App\Http\Controllers\Inner;

use App\Common\Lib\Result;
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

        $this->drawService->drawApply($params);

        return Result::success();
        // exit('succ');
    }

}
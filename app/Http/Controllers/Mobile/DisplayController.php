<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\DisplayRequest;
use App\Services\DisplayService;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    private $displayService;

    public function __construct(DisplayService $displayService)
    {
        $this->displayService = $displayService;
    }

    public function display(DisplayRequest $request)
    {
        $data = [];
        $user = Auth::user();
        $params = $request->goCheck('display');
        
        $data['url'] = $this->displayService->getUrl($user, $params);
        $data['act'] = $params['act'];
        
        return view(ViewHelper::getTemplate('common.webview'), $data);
    }
}
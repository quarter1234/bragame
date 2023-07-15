<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\DisplayRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;

class DisplayController extends Controller
{
    private $userService;

    public function __construct()
    {
        
    }

    public function display(DisplayRequest $request)
    {
        $params = $request->goCheck('display');
        return view('mobile.common.webview');
    }
}
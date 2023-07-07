<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

/**
 * 活动相关
 */
class ActivityController extends Controller
{
    private $userService;

    public function __construct()
    {
       
    }

    public function index()
    {
        return view('mobile.activity.index');
    }

    public function show()
    {
        return view('mobile.activity.show');
    }
}
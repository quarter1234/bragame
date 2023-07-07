<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;

class ShareController extends Controller
{
    public function index()
    {
        return view('mobile.share.index');
    }
}
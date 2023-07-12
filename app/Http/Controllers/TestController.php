<?php

namespace App\Http\Controllers;

use App\Facades\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index(Request $request)
    {
         User::testStr();
    }
}

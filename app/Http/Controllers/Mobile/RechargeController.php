<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RechargeController extends Controller
{
    private $userService;

    public function __construct()
    {

    }
    
    public function index()
    {
        $data = [];
        $data['user'] = Auth::user();
        return view('mobile.pay.recharge', $data);
    }
}
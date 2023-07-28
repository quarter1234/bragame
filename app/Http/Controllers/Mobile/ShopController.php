<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function __construct()
    {
       
    }

    public function index()
    {
        $data = [];
        $data['user'] = Auth::user();
        
        return view('mobile.shop.index', $data);
    }

    public function guide()
    {
        $data = [];
        $data['user'] = Auth::user();
        return view('mobile.shop.guide', $data);
    }

    public function bind()
    {
        $data = [];
        $data['user'] = Auth::user();
        return view('mobile.shop.bind', $data);
    }

    public function draw()
    {
        $data = [];
        $data['user'] = Auth::user();
        return view('mobile.shop.draw', $data);
    }
}
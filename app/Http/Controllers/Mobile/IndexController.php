<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $data=[];
        $data['user'] = null;
        if(Auth::check()) {
            $data['user'] = Auth::user();
        }

        return view('mobile.index.index', $data);
    }
}
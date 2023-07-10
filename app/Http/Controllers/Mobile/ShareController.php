<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ShareController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = [];
        $data['link'] = route('mobile.index', ['code' => $user['code']]);
        $data['code'] = $user['code'];

        return view('mobile.share.index', $data);
    }
}
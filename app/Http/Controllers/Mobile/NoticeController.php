<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;

class NoticeController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show()
    {
        $id = intval(Request::get('id', 0));
        return view('mobile.notice.show');
    }

    public function notices()
    {
        return view('mobile.notice.notices');
    }
}
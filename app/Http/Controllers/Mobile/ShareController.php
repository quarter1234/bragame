<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\ShareService;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    private $shareService;

    public function __construct(ShareService $shareService)
    {
       $this->shareService = $shareService;
    }

    public function index()
    {
        $user = Auth::user();

        $data = $this->shareService->getShareData($user);

        return view('mobile.share.index', $data);
    }

    public function invites()
    {
        print_r(1234);die();
    }
}
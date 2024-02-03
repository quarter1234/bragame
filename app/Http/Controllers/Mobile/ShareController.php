<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Lib\Result;
use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Services\ShareService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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

        return view(ViewHelper::getTemplate('share.index'), $data);
    }

    public function invites()
    {
        $user = Auth::user();
        $page = intval(Request::get('page', 1));

        $res = $this->shareService->getInviteCacheList($user, $page);
        return Result::success($res);
    }
}
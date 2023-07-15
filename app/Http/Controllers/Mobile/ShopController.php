<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\ShareService;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    private $shareService;

    public function __construct(ShareService $shareService)
    {
       $this->shareService = $shareService;
    }

    public function index()
    {
        return view('mobile.shop.index');
    }
}
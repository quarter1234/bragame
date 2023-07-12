<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Enum\CommonEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PublicRequest;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function index(PublicRequest $request)
    {
        $params = $request->goCheck('index');
       
        $data=[];
        $data['user'] = null;
        if(Auth::check()) {
            $data['user'] = Auth::user();
        }

        $data['showLogin'] = $params['showLogin'] ?? 0;
        $data['code'] = $params['code'] ?? '';

        if($data['code']) {
            session([CommonEnum::INVITE_CODE_KEY => $data['code']]);
        }

        return view('mobile.index.index', $data);
    }
}
<?php

namespace App\Http\Controllers\Mobile;

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
        // print_r($params);die();
        $data=[];
        $data['user'] = null;
        if(Auth::check()) {
            $data['user'] = Auth::user();
        }
        

        return view('mobile.index.index', $data);
    }
}
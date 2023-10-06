<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\UserHelper;
use App\Common\Lib\Result;

class PgProController extends Controller
{
    public function getUserBlance(Request $request){
        $userIdStr = $request->get('user_id', false);
        if(!$userIdStr){
            return Result::error('not find columns!');
        }

        $user = UserHelper::getUserByPgPro($userIdStr);
        if(!$user){
            return Result::error('not find user!');
        }

        return Result::success(['user_blance' => $user['coin']]);
    }
}
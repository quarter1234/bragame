<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Services\EmailService;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

/**
 * 个人中心相关
 */
class EmailController extends Controller
{
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function email()
    {
        return view('mobile.email.email');
    }

    public function emailList()
    {
        $user = Auth::user();
        $list = $this->emailService->getEmails($user)->toArray();
       
        return view('mobile.email.email_list', $list);
    }

    public function emailInfo()
    {
        $id = intval(Request::get('id', 0));
        $user = Auth::user();

        $data = [];
        $data['user'] = $user;
        $data['info'] = $this->emailService->getEmailInfo($id, $user);
       
        return view('mobile.email.email_info', $data);
    }

    public function getAttach()
    {
        $id = intval(Request::get('id', 0));
        $user = Auth::user();
        $info = $this->emailService->getEmailInfo($id, $user);
        if(!$info) {
            
        }

        print_r($id);die();
    }
}
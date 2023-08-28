<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Enum\CommonEnum;
use App\Common\Enum\GameEnum;
use App\Common\Lib\Result;
use App\Exceptions\BadRequestException;
use App\Http\Controllers\Controller;
use App\Services\EmailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Helper\RewardHelper;
use App\Helper\ViewHelper;

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
        $user = Auth::user();

        $data = [];
        $data['user'] = $user;
        return view(ViewHelper::getTemplate('email.email'), $data);
    }

    public function emailList()
    {
        $user = Auth::user();
        $list = $this->emailService->getEmails($user)->toArray();

        return view(ViewHelper::getTemplate('email.email_list'), $list);
    }

    public function emailInfo()
    {
        $id = intval(Request::get('id', 0));
        $user = Auth::user();

        $data = [];
        $data['user'] = $user;
        $data['info'] = $this->emailService->getEmailInfo($id, $user);

        return view(ViewHelper::getTemplate('email.email_info'), $data);
    }

    public function getAttach()
    {
        $id = intval(Request::get('id', 0));
        $user = Auth::user();
        $info = $this->emailService->getEmailInfo($id, $user);

        if(!$info) {
            throw new BadRequestException(['msg' => 'Bad Request!']);
        }

        if($info->hastake != CommonEnum::UNABLE) {
            throw new BadRequestException(['msg' => 'Você já reclamou o ouro']);

        }

        RewardHelper::addCoinByRate($user->uid, 
                                    $info->attach[1] ?? 0, 
                                    $info->rate, 
                                    GameEnum::PDEFINE['TYPE']['SOURCE']['Mail'], 
                                    GameEnum::PDEFINE['GAME_TYPE']['SPECIAL']['MAILATTACH'], 
                                    '', 
                                    false, 
                                    $info['id']);
        $info->hastake = CommonEnum::ENABLE;
        $info->hasread = CommonEnum::ENABLE;
        $info->draw_time = time();
        $info->save();

        return Result::success();
    }
}

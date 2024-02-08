<?php

namespace App\Http\Controllers\Mobile;

use App\Common\Enum\CommonEnum;
use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\PublicRequest;
use App\Services\IndexService;
use App\Services\GiftCardService;
use App\Exceptions\BadRequestException;
use App\Common\Lib\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class IndexController extends Controller
{
    private $indexService;

    public function __construct(IndexService $indexService)
    {
        $this->indexService = $indexService;
    }

    public function index(PublicRequest $request)
    {
        $params = $request->goCheck('index');
        $data = $this->indexService->getIndexData($params);

        $inviteCode = session(CommonEnum::INVITE_CODE_KEY);
        $data['inviteCode'] = $inviteCode ?: '';

        return view(ViewHelper::getTemplate('index.index'), $data);
    }

    public function bannerShow(int $id)
    {
        $data = [];
        $data['banner'] = $this->indexService->bannerInfo($id);

        return view(ViewHelper::getTemplate('index.banner_info'), $data);
    }

    public function giftCard()
    {
        // $user = Auth::user();
        $code = Request::get('code');
        $data = $this->indexService->getGiftCard($code);
        //return Result::success($data);
        $return = [
            // 'user' => $user,
            'url' => env("APP_URL"),
            'card' => $data,
        ];
        return view(ViewHelper::getTemplate('index.gift_card'), $return);
    }

    public function receiveCard(GiftCardService $giftCardService)
    {
        $mobile = Request::post('mobile');
        $code = Request::post('code');
        try {
            $data = $giftCardService->receiveCard($mobile, $code);
        } catch (BadRequestException $e) {
            return Result::error($e->getMessage());
        }
        return Result::success($data);
    }
}

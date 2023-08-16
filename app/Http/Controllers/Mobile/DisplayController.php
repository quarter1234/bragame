<?php

namespace App\Http\Controllers\Mobile;

use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\DisplayRequest;
use App\Services\DisplayService;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    private $displayService;

    public function __construct(DisplayService $displayService)
    {
        $this->displayService = $displayService;
    }

    public function display(DisplayRequest $request)
    {
        $data = [];
        $user = Auth::user();
        $params = $request->goCheck('display');
        $data['act'] = $params['act'];
        $data['url'] = '';
        $templateStr = ViewHelper::getTemplate('common.webview');
        $resData = $this->displayService->getUrl($user, $params);
        if($params['act'] == 'post_pay'){
            $data['msg'] = 'Request address not found';
            if(!empty($resData)){
                if($resData['code'] == 0){
                    $data['url'] = $resData['data']['payurl'] ?? '';
                    $data['msg'] = 'success';
                }
                else{
                    $data['msg'] = $resData['msg'] ?? '';
                    $templateStr = ViewHelper::getTemplate('errors.error');
                }
            
            }
        }
        else{
            $data['url'] = $resData;
        }
        
        return view($templateStr, $data);
    }
}
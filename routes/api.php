<?php

use App\Http\Controllers\Mobile\ActivityController;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\Mobile\DisplayController;
use App\Http\Controllers\Mobile\EmailController;
use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\MemberController;
use App\Http\Controllers\Mobile\NoticeController;
use App\Http\Controllers\Mobile\PublicController;
use App\Http\Controllers\Mobile\RechargeController;
use App\Http\Controllers\Mobile\RedPackageController;
use App\Http\Controllers\Mobile\ShareController;
use App\Http\Controllers\Mobile\ShopController;
// use App\Http\Controllers\TelegramController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api'
], function ($router) {
    Route::post('register', [PublicController::class, 'doRegister']);
    Route::post('login', [PublicController::class, 'doLogin']);
    Route::post('getPgs', [GameController::class, 'getPgs']);
    Route::post('getPps', [GameController::class, 'getPps']);
    Route::post('getJls', [GameController::class, 'getJls']);
    Route::post('getTadas', [GameController::class, 'getTadas']);
    Route::post('getPgPros', [GameController::class, 'getPgPros']);
    Route::post('getPgLive', [GameController::class, 'getPgLive']);

    Route::post('test', [\App\Http\Controllers\TestController::class, 'index']); //测试

    Route::post('index', [IndexController::class, 'index']); //首页数据

    Route::post('getnoticelist', [IndexController::class, 'getnoticelist']);

    Route::post('getbankcode', [IndexController::class, 'getbankcode']);

    // Route::post('/telegram/webhook', [TelegramController::class, 'handleWebhook']);
});

Route::group([
    'prefix' => 'api', 'middleware' => ['api.auth']
], function ($router) {
    Route::post('banner', [IndexController::class, 'bannerShow']);
    Route::post('pgUrl', [GameController::class, 'getPgUrl']); // 获得游戏登录地址
    Route::post('tadaUrl', [GameController::class, 'tadaUrl']);
    Route::post('pgproUrl', [GameController::class, 'pgproUrl']);
    Route::post('pgproOhUrl', [GameController::class, 'pgproOhUrl']);
    // 通知
    Route::post('notice/info', [NoticeController::class, 'show']);
    // 分享
    Route::post('share', [ShareController::class, 'index']);
    Route::post('share/invites', [ShareController::class, 'invites']);
    // 活动
    Route::post('activity', [ActivityController::class, 'index']);
    Route::post('activity/info', [ActivityController::class, 'show']);

    // iframe嵌入  公用
    Route::post('display', [DisplayController::class, 'display']);
    // 登出
    Route::post('logout', [PublicController::class, 'logout']);
});

// 个人中心相关
Route::group([
    'prefix' => 'api/member', 'middleware' => ['api.auth']
], function ($router) {
    Route::post('index ', [MemberController::class, 'index']);
    Route::post('getmoney', [MemberController::class, 'getmoney']);
    Route::post('customerService', [MemberController::class, 'customerService']);
    Route::post('vip', [MemberController::class, 'vip']);
    Route::post('doChangePassword', [MemberController::class, 'doChangePassword']);

    // 充值提现记录
    Route::post('rechargeList', [MemberController::class, 'rechargeList']);
    Route::post('drawList', [MemberController::class, 'drawsList']);
    //资金记录
    Route::post('transactionslist', [MemberController::class, 'transactionslist']);

    // 投注记录
    Route::post('betList', [MemberController::class, 'betsList']);

    // 邮件相关
    Route::post('emailList', [EmailController::class, 'emailList']);
    Route::post('emailInfo', [EmailController::class, 'emailInfo']);
    Route::post('getAttach', [EmailController::class, 'getAttach']);
});

// 商城相关
Route::group([
    'prefix' => 'api/shop', 'middleware' => ['api.auth']
], function ($router) {
    Route::post('index', [ShopController::class, 'index']);
    Route::post('guide', [ShopController::class, 'guide']); //银行卡列表
    Route::post('bind', [ShopController::class, 'bind']);
    Route::post('doBind', [ShopController::class, 'doBind']); //绑定银行卡
    Route::post('doDraw', [ShopController::class, 'doDraw']); //发起提现
    Route::post('drawconfig', [ShopController::class, 'drawconfig']); //提现限制
});


// 支付相关
Route::group([
    'prefix' => 'api/pay', 'middleware' => ['api.auth']
], function ($router) {
    Route::post('recharge', [RechargeController::class, 'index']);
    Route::post('pageback', [RechargeController::class, 'pageback']);
    Route::post('queOrder', [RechargeController::class, 'queOrder']);
});


// 红包相关
Route::group([
    'prefix' => 'api/redPacket', 'middleware' => ['api.auth']
], function ($router) {
    Route::get('doLottery', [RedPackageController::class, 'doLottery']);
});

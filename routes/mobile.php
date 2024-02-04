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
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('login');

Route::group([
    'prefix' => 'mobile'
], function ($router) {
    Route::get('register', [PublicController::class, 'register']);
    Route::post('register', [PublicController::class, 'doRegister']);
    Route::get('login', [PublicController::class, 'login']);
    Route::post('login', [PublicController::class, 'doLogin']);
    Route::get('index', [IndexController::class, 'index'])->name('mobile.index');
    Route::get('getPgs', [GameController::class, 'getPgs']);
    Route::get('getPps', [GameController::class, 'getPps']);
    Route::get('getJls', [GameController::class, 'getJls']);
    Route::get('getTadas', [GameController::class, 'getTadas']);
    Route::get('getPgPros', [GameController::class, 'getPgPros']);
    Route::post('giftCard', [IndexController::class, 'giftCard']);
    Route::post('receiveCard', [IndexController::class, 'receiveCard']);
    Route::get('test',[\App\Http\Controllers\TestController::class,'index']);
});

Route::group([
    'prefix' => 'mobile', 'middleware' => ['auth']
], function ($router) {
    Route::get('banner/{id}', [IndexController::class, 'bannerShow'])->name('mobile.banner.info');
    Route::get('pgUrl', [GameController::class, 'getPgUrl']); // 获得游戏登录地址
    Route::get('tadaUrl', [GameController::class, 'tadaUrl']);
    Route::get('pgproUrl', [GameController::class, 'pgproUrl']);
    // 通知
    Route::get('notices', [NoticeController::class, 'notices']);
    Route::get('notice/info', [NoticeController::class, 'show'])->name('mobile.notice.info');
    // 分享
    Route::get('share', [ShareController::class, 'index']);
    Route::get('share/invites', [ShareController::class, 'invites']); 
    // 活动
    Route::get('activity', [ActivityController::class, 'index']);
    Route::get('activity/info/{id}', [ActivityController::class, 'show'])->name('mobile.activity.info');
    // 签到
    Route::post('signin', [ActivityController::class, 'signIn']);
    Route::post('signlog', [ActivityController::class, 'signlog']);
    // iframe嵌入  公用
    Route::get('display', [DisplayController::class, 'display'])->name('mobile.display');
    // 登出
    Route::get('logout', [PublicController::class, 'logout']);
});

// 个人中心相关
Route::group([
    'prefix' => 'mobile/member', 'middleware' => ['auth']
], function ($router) {
    Route::get('index ', [MemberController::class, 'index']);
    Route::get('customerService', [MemberController::class, 'customerService']);
    Route::get('vip', [MemberController::class, 'vip']);

    Route::get('resetPassword', [MemberController::class, 'resetPassword']);
    Route::post('doChangePassword', [MemberController::class, 'doChangePassword']);

    // 交易记录
    Route::get('transaction', [MemberController::class, 'transaction']);

    Route::get('transactions', [MemberController::class, 'transactions']);
    Route::get('transactionslist', [MemberController::class, 'transactionslist']);
    Route::get('rechargeList', [MemberController::class, 'rechargeList']);
    Route::get('drawList', [MemberController::class, 'drawsList']);

    // 投注记录
    Route::get('bets', [MemberController::class, 'bets']);
    Route::get('betList', [MemberController::class, 'betsList']);

    // 邮件相关
    Route::get('email', [EmailController::class, 'email']);
    Route::get('emailList', [EmailController::class, 'emailList']);
    Route::get('emailInfo', [EmailController::class, 'emailInfo'])->name('mobile.email.info');
    Route::get('getAttach', [EmailController::class, 'getAttach'])->name('mobile.email.attach');
});

// 商城相关
Route::group([
    'prefix' => 'mobile/shop', 'middleware' => ['auth']
], function ($router) {
    Route::get('', [ShopController::class, 'index']);
    Route::get('guide', [ShopController::class, 'guide']);
    Route::get('bind', [ShopController::class, 'bind']);
    Route::post('doBind', [ShopController::class, 'doBind']);
    Route::get('draw', [ShopController::class, 'draw']);
    Route::post('doDraw', [ShopController::class, 'doDraw']);
});


// 支付相关
Route::group([
    'prefix' => 'mobile/pay', 'middleware' => ['auth']
], function ($router) {
    Route::get('recharge', [RechargeController::class, 'index']);
    Route::get('pageback', [RechargeController::class, 'pageback']);
    Route::post('queOrder', [RechargeController::class, 'queOrder']);
});


// 红包相关
Route::group([
    'prefix' => 'mobile/redPacket', 'middleware' => ['auth']
], function ($router) {
    Route::get('doLottery', [RedPackageController::class, 'doLottery']);
});
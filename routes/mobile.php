<?php

use App\Http\Controllers\Mobile\ActivityController;
use App\Http\Controllers\Game\GameController;
use App\Http\Controllers\Mobile\DisplayController;
use App\Http\Controllers\Mobile\IndexController;
use App\Http\Controllers\Mobile\MemberController;
use App\Http\Controllers\Mobile\NoticeController;
use App\Http\Controllers\Mobile\PublicController;
use App\Http\Controllers\Mobile\ShareController;
use App\Http\Controllers\Mobile\ShopController;
use Illuminate\Support\Facades\Route;

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
    Route::get('test',[\App\Http\Controllers\TestController::class,'index']);
});



Route::group([
    'prefix' => 'mobile', 'middleware' => ['auth']
], function ($router) {
    Route::get('notices', [NoticeController::class, 'notices']);
    Route::get('notice/info', [NoticeController::class, 'show'])->name('mobile.notice.info');

    Route::get('pgUrl', [GameController::class, 'getPgUrl']); // 获得游戏登录地址

    Route::get('member/index ', [MemberController::class, 'index']);
    Route::get('Member/setting', [MemberController::class, 'setting']);
    Route::get('member/customerService', [MemberController::class, 'customerService']);
    Route::get('member/vip', [MemberController::class, 'vip']);
    Route::get('member/email', [MemberController::class, 'email']);

    Route::get('share', [ShareController::class, 'index']);

    Route::get('activity', [ActivityController::class, 'index']);
    Route::get('activity/info/{id}', [ActivityController::class, 'show'])->name('mobile.activity.info');
    Route::get('logout', [PublicController::class, 'logout']);

    Route::get('banner/{id}', [IndexController::class, 'bannerShow'])->name('mobile.banner.info');

    Route::get('shop', [ShopController::class, 'index']);
   
    Route::get('display', [DisplayController::class, 'display'])->name('mobile.display');

});

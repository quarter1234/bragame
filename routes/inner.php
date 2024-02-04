<?php

use App\Http\Controllers\Inner\DrawController;
use App\Http\Controllers\Inner\PgController;
use App\Http\Controllers\Inner\JiliController;
use App\Http\Controllers\ManCallBack\CallApiController;
use App\Http\Controllers\Inner\PgProController;
use App\Http\Controllers\Inner\PgProOhController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::post('callBackAuth', [PgController::class, 'callBackAuth']); // 回调获得用户余额
    Route::post('blanceCallBack', [PgController::class, 'callBackBet']); // 注单和结算
    Route::post('drawApply', [DrawController::class, 'drawApply']); // 提现申请

    Route::post('jiliCallBackAuth', [JiliController::class, 'jiliCallBackAuth']); // jili回调获得用户余额
    Route::post('jiliCallBack', [JiliController::class, 'jiliCallBackBet']); // 注单和结算

     // 第三方假PG
     Route::post('ohCallBackAuth', [PgProOhController::class, 'callBackAuth']); // 回调获得用户余额
     Route::post('ohBlanceCallBack', [PgProOhController::class, 'callBackBet']); // 注单和结算
});

Route::group([
    'prefix' => 'inner'
], function ($router) {
    Route::post('getUserBlance', [PgProController::class, 'getUserBlance']);
    Route::post('lottCallBack', [PgProController::class, 'lottCallBack']);
});

Route::group([
    'prefix' => 'callapi', 'middleware' => ['cors']
], function ($router) {
    Route::get('/', [CallApiController::class, 'index']);
});

// 解决aws elb 健康检查 到session的表里面
Route::get('/healthcheck', function() {
    config()->set('session.driver', 'array');
    return response('Hello World', 200)
       ->header('Content-Type', 'text/plain');
});

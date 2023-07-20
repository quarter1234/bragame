<?php

use App\Http\Controllers\Inner\PgController;
use App\Http\Controllers\ManCallBack\CallApiController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::post('callBackAuth', [PgController::class, 'callBackAuth']); // 回调获得用户余额
    Route::post('blanceCallBack', [PgController::class, 'callBackBet']); // 注单和结算
});

Route::group([
    'prefix' => 'inner'
], function ($router) {
    Route::get('processRequestPay', [CallApiController::class, 'processRequestPay']); // 支付回调
    Route::get('processRequestUser', [CallApiController::class, 'processRequestUser']); // 后台回调修改用户信息(包括拒绝提现)
});

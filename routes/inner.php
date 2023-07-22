<?php

use App\Http\Controllers\Inner\DrawController;
use App\Http\Controllers\Inner\PgController;
use App\Http\Controllers\ManCallBack\CallApiController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::post('callBackAuth', [PgController::class, 'callBackAuth']); // 回调获得用户余额
    Route::post('blanceCallBack', [PgController::class, 'callBackBet']); // 注单和结算
    Route::post('drawApply', [DrawController::class, 'drawApply']); // 提现申请
});

Route::group([
    'prefix' => 'callapi', 'middleware' => ['cors']
], function ($router) {
    Route::get('/', [CallApiController::class, 'index']);
});

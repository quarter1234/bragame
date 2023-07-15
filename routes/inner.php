<?php

use App\Http\Controllers\Inner\PgController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::get('callBackAuth', [PgController::class, 'callBackAuth']); // 回调获得用户余额
    Route::post('blanceCallBack', [PgController::class, 'callBackBet']); // 注单和结算
});

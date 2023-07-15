<?php

use App\Http\Controllers\Inner\PgBetController;
use App\Http\Controllers\Game\GameController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::get('noticeBets', [PgBetController::class, 'noticeBets']);
    Route::get('callBackAuth', [GameController::class, 'callBackAuth']); // 回调获得用户余额
    Route::post('blanceCallBack', [GameController::class, 'callBackBet']); // 注单和结算
});

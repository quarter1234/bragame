<?php

use App\Http\Controllers\Inner\PgBetController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::get('noticeBets', [PgBetController::class, 'noticeBets']);
    Route::get('pgUrl', [GameController::class, 'getPgUrl']);
    Route::get('blanceCallBack', [GameController::class, 'callBackAuth']);
});

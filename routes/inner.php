<?php

use App\Http\Controllers\Inner\PgBetController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'inner','middleware' => ['inner_auth']
], function ($router) {
    Route::get('noticeBets', [PgBetController::class, 'noticeBets']);
});

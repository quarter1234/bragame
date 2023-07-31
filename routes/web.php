<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 解决aws elb 健康检查 到session的表里面
Route::get('/healthcheck', function() {
    config()->set('session.driver', 'array');
    return response('Hello World', 200)
       ->header('Content-Type', 'text/plain');
});



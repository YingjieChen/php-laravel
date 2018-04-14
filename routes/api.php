<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::prefix('wechat')->group(function(){
	Route::get('accesstoken','WechatAPI@generateAccessToken');
	Route::get('setmenu','WechatAPI@createMenu');
	Route::get('getmenu','WechatAPI@getMenu');
	Route::get('deletemenu','WechatAPI@deletemenu');
});

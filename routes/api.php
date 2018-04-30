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

//设置了 auth:api 访问的时候需要设置 header {Accept:"application/json",Authorization:"Bearer $access_token"}
Route::middleware('auth:api')->get('/user6', function (Request $request) {
	return $request->user();
});

Route::prefix('wechat')->group(function(){
	Route::get('accesstoken','WechatAPI@generateAccessToken');
	Route::get('setmenu','WechatAPI@createMenu');
	Route::get('getmenu','WechatAPI@getMenu');
	Route::get('deletemenu','WechatAPI@deletemenu');
});

Route::get('/redirect', function (){
	$query = http_build_query([
		'client_id' => '12',
		'redirect_uri' => 'http://192.168.10.10:8000/auth/callback',
		'response_type' => 'code',
		'scope' => '',
	]);

       	return redirect('http://192.168.10.10:8000/oauth/authorize?' . $query);
});

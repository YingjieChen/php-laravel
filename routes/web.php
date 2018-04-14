<?php

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


Route::prefix('user')->group(function(){
	Route::get('setskill',function(){
		return view('user.setskill');
	});
	Route::get('setnickname',function(){
		return view('user.setnickname');
	});
	Route::get('setchineseschool',function(){
		return view('user.setchineseschool');
	});
	Route::get('setage',function(){
                return view('user.setage');
        });
	Route::get('sethometown',function(){
		return view('user.sethometown');
	});
	Route::get('info', function () {
		return view('user.info');
	});
});

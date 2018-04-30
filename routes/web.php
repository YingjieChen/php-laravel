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

Route::get('test','Test@test');
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

// 不是微信浏览器的时候
Route::get('notweixin',function(){
    return view('errors.notweixin');
})->name('notweixin');

Route::group(['middleware'=>['iswechatbrowser','islogin']],function(){
    Route::get('/',function(){
        return view('welcome');
    });
});

Route::get('weixinauthore','WechatAPI@wxauthorize')->name('wxauthorize');
Route::get('weixinauthored.php','WechatAPI@wxauthorized')->name('wxauthorized');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/auth/callback', function (\Illuminate\Http\Request $request){
	echo $request->code;
});    

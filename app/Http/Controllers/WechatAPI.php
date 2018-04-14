<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use \App\wxUser;
use Illuminate\Support\Facades\DB;

class WechatAPI extends Controller{
	public function __construct(){
		if(!Cache::store('file')->has('weixinaccesstoken')){
			$Curl   =       new Curl();
			$acctokenurl    =       sprintf(config('wechat.urls.accesstoken'),config('wechat.appid'),config('wechat.appsecret'));
			//获取 acctoken
			$tokenarr       =       $Curl->get($acctokenurl);
			//将 accesstoken        写到缓存里面
			$expires_in     =       $tokenarr['expires_in']/60-10;
			Cache::store('file')->put('weixinaccesstoken',$tokenarr['access_token'],$tokenarr['expires_in']/60-10);
		}
	}
    /**         
     * To create menu for wechat
     *
     * @return response from wechat api server
     */
    public function createMenu(){
	$Curl   =       new Curl();
	$menuurl    =       sprintf(config('wechat.urls.createmenu'),Cache::store('file')->get('weixinaccesstoken'));
	$menudata	=	[
		"button"=>[
			[
				"type"=>"click",
				"name"=>"今日金曲".time(),
				"key"=>"KEYKEY",
			]
		],
	];
	$menudata	=	json_encode($menudata,JSON_UNESCAPED_UNICODE);
	$menuarr       =       $Curl->post($menuurl,$menudata);
	return [
		'datafromwexinserver'=>$menuarr,
	];
    }
    public function deleteMenu(){
	$Curl   =       new Curl();
        $menuurl    =       sprintf(config('wechat.urls.deletemenu'),Cache::store('file')->get('weixinaccesstoken'));
	$menuarr       =       $Curl->post($menuurl);
        return [
                'datafromwexinserver'=>$menuarr,
        ];
    }
    public function getMenu(){
	$Curl   =       new Curl();
        $getmenuurl    =       sprintf(config('wechat.urls.getmenu'),Cache::store('file')->get('weixinaccesstoken'));
        //获取 acctoken
        $menuarr       =       $Curl->get($getmenuurl);
        //将 accesstoken        写到缓存里面
        //$expires_in     =       $tokenarr['expires_in']/60-10;
        //Cache::store('file')->put('weixinaccesstoken',$tokenarr['access_token'],$tokenarr['expires_in']/60-10);
        return [
                //'appid'=>config('wechat.appid'),
                //'appsecret'=>config('wechat.appsecret'),
                'menu'=>$menuarr,
        ];
    }

    public function createAddMenu(){

    }
    public function deleteAddMenu(){
    }
    public function matchAddMenu(){
    }

	public function wxauthorize(){
		$state			=	sha1(rand()*time());
		$wechatauthorizeurl	=	sprintf(config('wechat.urls.authorize'),config('wechat.appid'),urlencode(route('weixinauthored')),$state);
		//echo $wechatauthorizeurl;
		return redirect($wechatauthorizeurl);
	}

	public function wxauthorized(){
		$code			=	request()->get('code');
		$wechatauthorizedurl     =       sprintf(config('wechat.urls.authorized'),config('wechat.appid'),config('wechat.appsecret'),$code);
		$Curl			=	new Curl();
		$acctokenarr		=	$Curl->get($wechatauthorizedurl);
		if(isset($acctokenarr['errcode'])){
			// 刷新 token 操作
			//return $acctokenarr;
		}else{
			$accesstoken         =		$acctokenarr['access_token'];
			$openid		     =		$acctokenarr['openid'];
			$refreshtoken        =       	$acctokenarr['refresh_token'];
			//return $acctokenarr;
			$wechatgetinfourl    =       sprintf(config('wechat.urls.getuserinfo'),$accesstoken,$openid);
			$userinfo	     =       $Curl->get($wechatgetinfourl);
			$userinfo['api_token']	=	str_random(60);
			//转移到其他页面
			//登录用户并且记录用户信息
			$userinfodatabase	=	\App\wxUser::updateOrCreate([
				'openid'=>$userinfo['openid']
			],$userinfo);
			Auth::guard('web')->login($userinfodatabase,true);
			//return Auth::guard('api')->user();
			return redirect('?123456');
		}
	}
	
	public function jsapi(){
		$Curl		=	new Curl();
		$jsapiurl     = sprintf(config('wechat.urls.jsapi'),Cache::store('file')->get('weixinaccesstoken'));
		$ticketarr    =       $Curl->get($jsapiurl);
		return [
			'jsapi_ticket'=>$ticketarr['ticket'],
		];
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

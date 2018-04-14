<?php
return [
	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/
	'appid'		=>	'wxfb1310dad14732da',
	'appsecret'	=>	'd4624c36b6795d1d99dcf0547af5443d',
	'urls'=>[
		'accesstoken'	=>'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s',
		'createmenu'	=>'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s',
		'getmenu'	=>'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=%s',	
		'deletemenu'	=>'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=%s',
		'createaddmenu'	=>'https://api.weixin.qq.com/cgi-bin/menu/addconditional?access_token=%s',
		'deleteaddmenu'	=>'https://api.weixin.qq.com/cgi-bin/menu/delconditional?access_token=%s',
		'matchaddmenu'	=>'https://api.weixin.qq.com/cgi-bin/menu/trymatch?access_token=%s',
		'authorize'	=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_userinfo&state=%s#wechat_redirect',
		'authorized'	=>'https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code',
		'authorized2'	=>'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=%s&grant_type=refresh_token&refresh_token=%s',
		'getuserinfo'	=>'https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=zh_CN',
		'jsapi'		=>'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi',
	],
];

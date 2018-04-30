<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Test extends Controller{
	public function test(){	
	
		$response = $http->post('http://your-app.com/oauth/token', [
		'form_params' => [
			'grant_type' => 'password',
			'client_id' => 'client-id',
			'client_secret' => 'client-secret',
			'username' => 'taylor@laravel.com',
			'password' => 'my-password',
			'scope' => '*',
		],
	]);
	}
	public function shouquan(){
		$user = \App\User::find(1);
		// Creating a token without scopes...
		$token = $user->createToken('Private 12')->accessToken;
		echo "$token\n";
		// Creating a token with scopes...
		$token = $user->createToken('My Token', ['place-orders'])->accessToken;
		echo "$token\n";
	}
	public function quxiaoshouquan(){

	}
}

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

	}
	public function quxiaoshouquan(){

	}
}

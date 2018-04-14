<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\wxUser;
use \App\story;
use Illuminate\Support\Facades\Auth;
class Test extends Controller{
	public function test(){	
		if(Auth::login(['openid'=>'ocTZmuMr6myx2M-a1bExHr4btK44','password'=>''])){
			echo "登录成功";
		}else{
			echo "登录失败";
		}
	}
}

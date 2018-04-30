<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Juhe extends Controller{
    //
	public function toh($method='list',$args=''){
		switch($method){
			case('detail'):
				$curlobj        =       new Curl();
                                $requesturl     =       sprintf(config('juhe.today_history.dateurl'),$args,config('juhe.today_history.key'));
                                $responsedata   =       $curlobj->get($requesturl);
			break;
			default:
				$curlobj        =       new Curl();
				$datestr        =       urlencode(date('n/j',time()));
				$requesturl     =       sprintf(config('juhe.today_history.listurl'),$datestr,config('juhe.today_history.key'));
				$responsedata   =       $curlobj->get($requesturl);
			break;
		}
                return $responsedata;
	}
}

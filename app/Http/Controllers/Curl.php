<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Curl extends Controller{
    //
	public function __construct(){
		$this->url	=	"";
		$this->ch       =       curl_init();
		$accept         =       "application/json";
		$content_type   =       "application/json;charset=utf-8";
		$headers        =       [
			"Accept:$accept",
			"Content-type:$content_type",
		];
		//设置选项，包括URL
		curl_setopt($this->ch,CURLOPT_HTTPHEADER,$headers);
		curl_setopt($this->ch,CURLOPT_URL,$this->url);
		curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($this->ch,CURLOPT_HEADER,0);
	}
	public function __destruct(){
		curl_close($this->ch);
	}
	public function get($url){
		curl_setopt($this->ch,CURLOPT_URL,$url);
		//执行并获取HTML文档内容
		$output         =       curl_exec($this->ch);
		//$responsedata	=	$output;
		$responsedata	=	json_decode($output,true);
		return $responsedata;
	}
	public function post($url,$post_data=[]){
		curl_setopt($this->ch,CURLOPT_URL,$url);
		// post数据
		curl_setopt($this->ch, CURLOPT_POST, 1);
		if(is_array($post_data)){
			$post_data	=	json_encode($post_data);
		}
		// post的变量
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,$post_data);
		//执行并获取HTML文档内容
                $output         =       curl_exec($this->ch);
                //$responsedata =       $output;
                $responsedata   =       json_decode($output,true);
                return $responsedata;
	}
}

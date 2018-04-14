<html style="font-size: 23.4375px;">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui"/>
		<meta name="screen-orientation" content="portrait"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="format-detection" content="telephone=no"/>
		<meta name="full-screen" content="yes"/>
		<meta name="x5-fullscreen" content="true"/>
		<link href="/css/app.mobile.css" rel="stylesheet"/>
	</head>
	<body>
		<div id="app">   
			<div>  
				<div class="search_form">
					<a id="datebutton" href="javascript:void(0)" class="header_style">
						<span class="header_left">出生日期</span>
				
						<span class="header_right">1993-02-28</span>
					</a>
				</div>
				<div class="search_form">
                                        <a href="/vipcard/vipDescription" class="header_style">
						<span class="header_left">星座</span>
						<span class="header_right" v-model="xingzuo">双鱼座</span>
                                        </a>                                
				</div>
				<div class="search_form"><input type="submit" name="submit" class="search_submit" value="保存"/></div>
			</div>
		</div>
	</body>
	<script src="{{asset('/js/jquery.min.js')}}"></script> 
	<script>
		$(function(){

		});
	</script>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="font-size: 23.4375px;">
    <head>
        <title>请用微信打开本网站</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui"/>
        <meta name="screen-orientation" content="portrait"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="format-detection" content="telephone=no"/>
        <meta name="full-screen" content="yes"/>
        <meta name="x5-fullscreen" content="true"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 1rem;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">请用微信打开本网站</div>
            </div>
        </div>
    </body>
    <script>
        window.onresize = window.onload = function () {
            var w = $(window).width();
            if(w<640){
                var size = 20*w/640;
                /*640的时候
                对应html的font-size为20，那么宽度为w是对应
                的font-size可这么求*/
                $('html').css('fontSize',size+'px');
            }
        }
    </script>
</html>

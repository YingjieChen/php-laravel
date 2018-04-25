<?php

namespace App\Http\Middleware;

use Closure;

class IsWechatBrowser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger') !== false ){
            return redirect(route('notweixin'));
        }
        return $next($request);
    }
}

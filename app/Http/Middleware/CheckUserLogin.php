<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cookie;
use Closure;

class CheckUserLogin
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
        $cookie = Cookie::get("cookieLogin","[]");
        $cookieLogin = json_decode($cookie,true);

        if (!$cookieLogin){
            return redirect('/home')->with('message', 'Login Terlebih dahulu');
        }
        return $next($request);
    }
}

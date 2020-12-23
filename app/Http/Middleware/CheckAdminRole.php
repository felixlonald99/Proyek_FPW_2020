<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAdminRole
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
        if (!Session::has('admin')) {
            return redirect()->back()->with('message', 'NOT AUTHORIZED!\n YOU ARE NOT AN ADMIN!');;
        }
        return $next($request);
    }
}

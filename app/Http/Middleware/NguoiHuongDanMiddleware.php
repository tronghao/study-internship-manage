<?php

namespace App\Http\Middleware;

use Closure;

class NguoiHuongDanMiddleware
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
        if( $request->session()->has('email') && $request->session()->has('role') && $request->session()->get('role') == "nguoihuongdan")
            return $next($request);
        else return redirect("");
    }
}

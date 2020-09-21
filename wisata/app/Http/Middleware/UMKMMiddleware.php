<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UMKMMiddleware
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
        if(Auth::check()) {
            if (Auth::user()->jenis_usaha == 'umkm') {
                return $next($request);
            }else{
                return redirect(route('home'));
            }
        }else{
            return redirect(route('login'));
        }
    }
}

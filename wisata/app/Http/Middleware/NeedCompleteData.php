<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NeedCompleteData
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
            if(Auth::user()->jenis_usaha != null) {
                return $next($request);
            }else{
                return redirect(route('complete-data'));
            }
        }else{
            return redirect(route('login'));
        }
    }
}

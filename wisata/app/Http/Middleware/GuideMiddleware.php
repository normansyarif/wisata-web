<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuideMiddleware
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
            if (Auth::user()->jenis_usaha == 'guide') {
                return $next($request);
            }else if(Auth::user()->jenis_usaha == 'homestay'){
                return redirect(route('homestay'));
            }else if(Auth::user()->jenis_usaha == 'art') {
                return redirect(route('art'));
            }else if(Auth::user()->jenis_usaha == 'souvenir') {
                return redirect(route('souvenir'));
            }else if(Auth::user()->jenis_usaha == 'admin') {
                return redirect(route('admin.progress'));
            }else{
                return redirect(route('home'));
            }
        }else{
            return redirect(route('login'));
        }
    }
}

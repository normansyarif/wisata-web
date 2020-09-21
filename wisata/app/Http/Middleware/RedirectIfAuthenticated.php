<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check()) {
            if (Auth::user()->jenis_usaha == 'admin') {
                return redirect(route('admin.progress'));
            }else if(Auth::user()->jenis_usaha == 'homestay'){
                return redirect(route('homestay'));
            }else if(Auth::user()->jenis_usaha == 'art') {
                return redirect(route('art'));
            }else if(Auth::user()->jenis_usaha == 'souvenir') {
                return redirect(route('souvenir'));
            }else if(Auth::user()->jenis_usaha == 'guide') {
                return redirect(route('guide'));
            }else if(Auth::user()->jenis_usaha == 'rm') {
                return redirect(route('rm'));
            }else if(Auth::user()->jenis_usaha == 'tani') {
                return redirect(route('tani'));
            }else if(Auth::user()->jenis_usaha == 'umkm') {
                return redirect(route('umkm'));
            }else if(Auth::user()->jenis_usaha == 'kendaraan') {
                return redirect(route('kendaraan'));
            }else{
                return redirect(route('home'));
            }
        }

        return $next($request);
    }
}

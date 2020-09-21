<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
        if(Auth::user()->jenis_usaha != null) {
            if (Auth::user()->jenis_usaha == 'admin') {
                return '/admin/progress';
            }else if(Auth::user()->jenis_usaha == 'homestay'){
                return '/homestay';
            }else if(Auth::user()->jenis_usaha == 'art') {
                return '/kelompok-seni';
            }else if(Auth::user()->jenis_usaha == 'souvenir') {
                return '/souvenir';
            }else if(Auth::user()->jenis_usaha == 'guide') {
                return '/tour-guide';
            }else{
                return '/';
            }
        }else{
            return '/lengkapi-data';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

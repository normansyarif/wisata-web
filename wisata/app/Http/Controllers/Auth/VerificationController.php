<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Pesan;

class GuestController extends Controller
{
    public function home() {
    	$slider = Slider::all();
    	return view('welcome')->with('slider', $slider);
    }

    public function contact() {
    	return view('contact');
    }

    public function getPlusCode() {
    	return view('get-plus-code');
    }

    public function tac() {
        return view('tac');
    }

    public function pesanInsert(Request $req) {
        $pesan = new Pesan;
        $pesan->nama = $req->input('nama');
        $pesan->email = $req->input('email');
        $pesan->judul = $req->input('judul');
        $pesan->pesan = $req->input('pesan');
        if($pesan->save()) {
            return redirect()->back()->with('success', 'Pesan anda berhasil dikirim. Terima kasih.');
        }else{
            return redirect()->back()->with('error', 'Gagal mengirim pesan. Mohon coba lagi.');
        }
    }
}



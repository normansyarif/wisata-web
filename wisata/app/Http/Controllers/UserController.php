<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wilayah;
use App\User;
use File;
use Hash;
use App\Classes\Helper;

class UserController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

    public function __construct() {
        $this->middleware('user');
    }

    public function completeData() {
    	if(Auth::user()->jenis_usaha != null) {
            return redirect(route('dashboard'));
        }else{
            $wilayah = Wilayah::orderBy('nama', 'asc')->get();
            return view('complete-data')->with('wilayah', $wilayah);
        }
    }

    public function completeDataPost(Request $req) {
        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/profile'), $filenameToStore);
                Helper::generateThumbnail('uploads/profile', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        $user = User::find(Auth::user()->id);
        $user->hp = $req->input('hp');
        $user->wa = $req->input('wa');
        $user->alamat = $req->input('alamat');
        $user->id_wilayah = $req->input('wilayah');
        $user->plus_code = $req->input('plus-code');
        $user->jenis_usaha = $req->input('jenis-usaha');
        $user->foto = $filenameToStore;

        if($user->save()) {
            return redirect(route('dashboard'));
        }else{
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
        
    }

    public function dashboard() {
        if(Auth::user()->jenis_usaha != null) {
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
        }else{
            return redirect(route('complete-data'));
        }
    }

    public function profile() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('profile')->with('wilayah', $wilayah);
    }

    public function profileUpdate(Request $req) {
        $user = User::find(Auth::user()->id);

        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/profile/'. $user->foto);
                File::delete('uploads/profile/thumbs/'. $user->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/profile'), $filenameToStore);
                Helper::generateThumbnail('uploads/profile', $filenameToStore);
            }
        }else{
            $filenameToStore = $user->foto;
        }

        $user->hp = $req->input('hp');
        $user->wa = $req->input('wa');
        $user->alamat = $req->input('alamat');
        $user->id_wilayah = $req->input('wilayah');
        $user->plus_code = $req->input('plus-code');
        $user->foto = $filenameToStore;

        if($user->save()) {
            return redirect()->back()->with('success', 'Berhasil mengubah data');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah data');
        }
    }

    public function passUpdate(Request $req) {
        $old = $req->input('old-pass');
        $new = $req->input('new-pass');
        $confirm = $req->input('confirm-pass');
        
        if(empty($old)) {
            return redirect()->back()->with('error', 'Mohon isi password lama');
        }

        if($new != $confirm) {
            return redirect()->back()->with('error', 'Password konfirmasi tidak cocok');
        }

        if(strlen($new) < 8) {
            return redirect()->back()->with('error', 'Password minimal 8 karakter');
        }

        if(Hash::check($old, Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($new);
            $user->save();
            return redirect()->back()->with('success', 'Berhasil mengubah password');
        }else{
            return redirect()->back()->with('error', 'Password salah');
        }

    }
}

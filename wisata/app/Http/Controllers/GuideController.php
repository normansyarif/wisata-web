<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use Auth;
use File;
use App\Wilayah;

class GuideController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

	public function __construct() {
        $this->middleware('data');   
        $this->middleware('guide');
    }

    public function index() {
    	$item = Guide::where('id_pemilik', Auth::user()->id)->first();
    	return view('user.guide-index')->with('item', $item);
    }

    public function delete($id) {
    	$guide = Guide::find($id);

        if($guide->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        if($guide->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus tour guide');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus tour guide');
        }
    }

    public function update(Request $req, $id) {
        $guide = Guide::find($id);
        
        if($guide->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        $guide->tarif = $req->input('tarif');
        $guide->deskripsi = $req->input('deskripsi');

        if($guide->save()) {
            return redirect(route('guide'))->with('success', 'Berhasil mengubah tour guide.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah tour guide');
        }
    }

    public function insert(Request $req) {
    	$guide = new Guide;
        $guide->tarif = $req->input('tarif');
        $guide->deskripsi = $req->input('deskripsi');
        $guide->id_pemilik = Auth::user()->id;
        $guide->id_wilayah = Auth::user()->id_wilayah;
        $guide->status = 'pending';

        if($guide->save()) {
            return redirect(route('guide'));
        }else{
            return redirect()->back()->with('error', 'Gagal menambah tour guide');
        }
    }
}

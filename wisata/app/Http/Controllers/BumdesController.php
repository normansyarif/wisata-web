<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bumdes;
use App\Wilayah;

class BumdesController extends Controller
{
    public function __construct() {
      $this->middleware('admin');
    }

    public function index() {
        $bumdes = Bumdes::all();
        return view('admin.bumdes')->with('bumdes', $bumdes);
    }

    public function add() {
        $wilayah = Wilayah::all();
        return view('admin.bumdes-add')->with('wilayah', $wilayah);
    }

    public function insert(Request $req) {
        $bumdes = new Bumdes;

        $bumdes->wilayah_id = $req->input('wilayah');
        $bumdes->latlng = $req->input('latlng');
        $bumdes->deskripsi = $req->input('deskripsi');

        if($bumdes->save()) {
            return redirect(route('admin.bumdes'))->with('success', 'Berhasil menambahkan bumdes');
        }else{
            return redirect()->back()->with('error', 'Gagal menambahkan bumdes');
        }
    }

    public function edit($id) {
        $wilayah = Wilayah::all();
        $bumdes = Bumdes::find($id);
        return view('admin.bumdes-edit')->with('bumdes', $bumdes)->with('wilayah', $wilayah);
    }

    public function update(Request $req, $id) {
        $bumdes = Bumdes::find($id);

        $bumdes->wilayah_id = $req->input('wilayah');
        $bumdes->latlng = $req->input('latlng');
        $bumdes->deskripsi = $req->input('deskripsi');

        if($bumdes->save()) {
            return redirect(route('admin.bumdes'))->with('success', 'Berhasil mengubah bumdes');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah bumdes');
        }
    }

    public function delete($id) {
        $bumdes = Bumdes::find($id);

        if($bumdes->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus bumdes');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus bumdes');
        }
    }
}

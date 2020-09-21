<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;
use Auth;
use File;
use App\Wilayah;
use App\Classes\Helper;


class ArtController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

	public function __construct() {
        $this->middleware('data');
        $this->middleware('art');
    }

    public function index() {
    	$items = Art::where('id_pemilik', Auth::user()->id)->orderBy('nama', 'asc')->get();
    	return view('user.art-index')->with('items', $items);
    }

    public function delete($id) {
    	$art = Art::find($id);

        if($art->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        File::delete('uploads/art/'. $art->foto);
        File::delete('uploads/art/thumbs/'. $art->foto);
        if($art->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus kelompok seni');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus kelompok seni');
        }
    }

    public function edit($id) {
        $item = Art::find($id);

        if($item->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('user.art-edit')
            ->with('wilayah', $wilayah)
            ->with('item', $item);
    }

    public function update(Request $req, $id) {
        $art = Art::find($id);

        if($art->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

    	if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/art/'. $art->foto);
                File::delete('uploads/art/thumbs/'. $art->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/art'), $filenameToStore);
                Helper::generateThumbnail('uploads/art', $filenameToStore);
            }
        }else{
            $filenameToStore = $art->foto;
        }

        $art->nama = $req->input('nama');
        $art->jenis_kesenian = $req->input('jenis-kesenian');
        $art->alamat = $req->input('alamat');
        $art->latlng = $req->input('latlng');
        $art->id_wilayah = $req->input('wilayah');
        $art->deskripsi = $req->input('deskripsi');
        $art->status = 'pending';
        $art->foto = $filenameToStore;

        if($art->save()) {
            return redirect(route('art'))->with('success', 'Berhasil mengubah kelompok seni.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah kelompok seni');
        }
    }

    public function add() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
    	return view('user.art-add')->with('wilayah', $wilayah);
    }

    public function insert(Request $req) {
        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/art'), $filenameToStore);
                Helper::generateThumbnail('uploads/art', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

    	$art = new Art;
        $art->nama = $req->input('nama');
        $art->jenis_kesenian = $req->input('jenis-kesenian');
        $art->alamat = $req->input('alamat');
        $art->latlng = $req->input('latlng');
        $art->id_wilayah = $req->input('wilayah');
        $art->deskripsi = $req->input('deskripsi');
        $art->id_pemilik = Auth::user()->id;
        $art->status = 'pending';
        $art->foto = $filenameToStore;

        if($art->save()) {
            return redirect(route('art'))->with('success', 'Entri berhasil ditambahkan. Menunggu verifikasi.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah kelompok seni');
        }
    }
}

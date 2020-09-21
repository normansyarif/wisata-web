<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Souvenir;
use Auth;
use File;
use App\Wilayah;
use App\Classes\Helper;

class SouvenirController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

	public function __construct() {
        $this->middleware('data');
        $this->middleware('souvenir');
    }

    public function index() {
    	$items = Souvenir::where('id_pemilik', Auth::user()->id)->orderBy('nama', 'asc')->get();
    	return view('user.souvenir-index')->with('items', $items);
    }

    public function delete($id) {
    	$souvenir = Souvenir::find($id);

        if($souvenir->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        File::delete('uploads/souvenir/'. $souvenir->foto);
        File::delete('uploads/souvenir/thumbs/'. $souvenir->foto);
        if($souvenir->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus souvenir');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus souvenir');
        }
    }

    public function edit($id) {
        $item = Souvenir::find($id);

        if($item->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('user.souvenir-edit')
            ->with('wilayah', $wilayah)
            ->with('item', $item);
    }

    public function update(Request $req, $id) {
        $souvenir = Souvenir::find($id);

        if($souvenir->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

    	if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/souvenir/'. $souvenir->foto);
                File::delete('uploads/souvenir/thumbs/'. $souvenir->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/souvenir'), $filenameToStore);
                Helper::generateThumbnail('uploads/souvenir', $filenameToStore);
            }
        }else{
            $filenameToStore = $souvenir->foto;
        }

        $souvenir->nama = $req->input('nama');
        $souvenir->harga = $req->input('harga');
        $souvenir->alamat = $req->input('alamat');
        $souvenir->plus_code = $req->input('plus-code');
        $souvenir->id_wilayah = $req->input('wilayah');
        $souvenir->deskripsi = $req->input('deskripsi');
        $souvenir->status = 'pending';
        $souvenir->foto = $filenameToStore;

        if($souvenir->save()) {
            return redirect(route('souvenir'))->with('success', 'Berhasil mengubah souvenir.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah souvenir');
        }
    }

    public function add() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
    	return view('user.souvenir-add')->with('wilayah', $wilayah);
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
                $req->file('foto')->move(public_path('uploads/souvenir'), $filenameToStore);
                Helper::generateThumbnail('uploads/souvenir', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

    	  $souvenir = new Souvenir;
        $souvenir->nama = $req->input('nama');
        $souvenir->harga = $req->input('harga');
        $souvenir->alamat = $req->input('alamat');
        $souvenir->plus_code = $req->input('plus-code');
        $souvenir->id_wilayah = $req->input('wilayah');
        $souvenir->deskripsi = $req->input('deskripsi');
        $souvenir->id_pemilik = Auth::user()->id;
        $souvenir->status = 'pending';
        $souvenir->foto = $filenameToStore;

        if($souvenir->save()) {
            return redirect(route('souvenir'))->with('success', 'Entri berhasil ditambahkan. Menunggu verifikasi.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah souvenir');
        }
    }
}

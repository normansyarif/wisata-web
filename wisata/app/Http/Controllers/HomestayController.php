<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homestay;
use Auth;
use File;
use App\Wilayah;
use App\Classes\Helper;

class HomestayController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

	public function __construct() {
        $this->middleware('data');
        $this->middleware('homestay');
    }

    public function index() {
    	$items = Homestay::where('id_pemilik', Auth::user()->id)->orderBy('nama', 'asc')->get();
    	return view('user.homestay-index')->with('items', $items);
    }

    public function delete($id) {
    	$homestay = Homestay::find($id);

        if($homestay->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        File::delete('uploads/homestay/'. $homestay->foto);
        File::delete('uploads/homestay/thumbs/'. $homestay->foto);
        if($homestay->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus homestay');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus homestay');
        }
    }

    public function edit($id) {
        $item = Homestay::find($id);

        if($item->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('user.homestay-edit')
            ->with('wilayah', $wilayah)
            ->with('item', $item);
    }

    public function update(Request $req, $id) {
        $homestay = Homestay::find($id);

        if($homestay->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

    	if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/homestay/'. $homestay->foto);
                File::delete('uploads/homestay/thumbs/'. $homestay->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/homestay'), $filenameToStore);
                Helper::generateThumbnail('uploads/homestay', $filenameToStore);
            }
        }else{
            $filenameToStore = $homestay->foto;
        }

        $homestay->nama = $req->input('nama');
        $homestay->kamar_tersedia = $req->input('kamar-tersedia');
        $homestay->kisaran_harga = $req->input('kisaran-harga');
        $homestay->alamat = $req->input('alamat');
        $homestay->latlng = $req->input('latlng');
        $homestay->id_wilayah = $req->input('wilayah');
        $homestay->fasilitas = $req->input('fasilitas');
        $homestay->status = 'pending';
        $homestay->foto = $filenameToStore;

        if($homestay->save()) {
            return redirect(route('homestay'))->with('success', 'Berhasil mengubah homestay.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah homestay');
        }
    }

    public function add() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
    	return view('user.homestay-add')->with('wilayah', $wilayah);
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
                $req->file('foto')->move(public_path('uploads/homestay'), $filenameToStore);
                Helper::generateThumbnail('uploads/homestay', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

    	$homestay = new Homestay;
        $homestay->nama = $req->input('nama');
        $homestay->kamar_tersedia = $req->input('kamar-tersedia');
        $homestay->kisaran_harga = $req->input('kisaran-harga');
        $homestay->alamat = $req->input('alamat');
        $homestay->latlng = $req->input('latlng');
        $homestay->id_wilayah = $req->input('wilayah');
        $homestay->fasilitas = $req->input('fasilitas');
        $homestay->id_pemilik = Auth::user()->id;
        $homestay->status = 'pending';
        $homestay->foto = $filenameToStore;

        if($homestay->save()) {
            return redirect(route('homestay'))->with('success', 'Entri berhasil ditambahkan. Menunggu verifikasi.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah homestay');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\RM;
use App\Wilayah;
use Illuminate\Support\Facades\Auth;
use App\Classes\Helper;

class RMController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

	public function __construct() {
        $this->middleware('data');
        $this->middleware('rm');
    }

    public function index() {
    	$items = RM::where('id_pemilik', Auth::user()->id)->orderBy('nama', 'asc')->get();
    	return view('user.rm-index')->with('items', $items);
    }

    public function delete($id) {
    	$data = RM::find($id);

        if($data->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        File::delete('uploads/rm/'. $data->foto);
        File::delete('uploads/rm/thumbs/'. $data->foto);
        if($data->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function edit($id) {
        $item = RM::find($id);

        if($item->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('user.rm-edit')
            ->with('wilayah', $wilayah)
            ->with('item', $item);
    }

    public function update(Request $req, $id) {
        $data = RM::find($id);

        if($data->id_pemilik != Auth::user()->id) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

    	if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/rm/'. $data->foto);
                File::delete('uploads/rm/thumbs/'. $data->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/rm'), $filenameToStore);
                Helper::generateThumbnail('uploads/rm', $filenameToStore);
            }
        }else{
            $filenameToStore = $data->foto;
        }

        $data->nama = $req->input('nama');
        $data->alamat = $req->input('alamat');
        $data->latlng = $req->input('latlng');
        $data->id_wilayah = $req->input('wilayah');
        $data->deskripsi = $req->input('deskripsi');
        $data->status = 'pending';
        $data->foto = $filenameToStore;

        if($data->save()) {
            return redirect(route('rm'))->with('success', 'Berhasil mengubah data.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah data');
        }
    }

    public function add() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
    	return view('user.rm-add')->with('wilayah', $wilayah);
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
                $req->file('foto')->move(public_path('uploads/rm'), $filenameToStore);
                Helper::generateThumbnail('uploads/rm', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

    	$data = new RM;
        $data->nama = $req->input('nama');
        $data->alamat = $req->input('alamat');
        $data->latlng = $req->input('latlng');
        $data->id_wilayah = $req->input('wilayah');
        $data->deskripsi = $req->input('deskripsi');
        $data->id_pemilik = Auth::user()->id;
        $data->status = 'pending';
        $data->foto = $filenameToStore;

        if($data->save()) {
            return redirect(route('rm'))->with('success', 'Entri berhasil ditambahkan. Menunggu verifikasi.');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah data');
        }
    }
}

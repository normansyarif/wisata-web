<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\UMKM;
use App\Wilayah;
use Illuminate\Support\Facades\Auth;
use App\Classes\Helper;

class UMKMController extends Controller
{
  private $allowedExt = ["jpg", "png", "jpeg", "svg"];

  public function __construct() {
      $this->middleware('data');
      $this->middleware('umkm');
  }

  public function index() {
    $items = UMKM::where('id_pemilik', Auth::user()->id)->orderBy('nama', 'asc')->get();
    return view('user.umkm-index')->with('items', $items);
  }

  public function delete($id) {
    $data = UMKM::find($id);

      if($data->id_pemilik != Auth::user()->id) {
          return redirect()->back()->with('error', 'Akses ditolak');
      }

      File::delete('uploads/umkm/'. $data->foto);
      File::delete('uploads/umkm/thumbs/'. $data->foto);
      if($data->delete()) {
          return redirect()->back()->with('success', 'Berhasil menghapus data');
      }else{
          return redirect()->back()->with('error', 'Gagal menghapus data');
      }
  }

  public function edit($id) {
      $item = UMKM::find($id);

      if($item->id_pemilik != Auth::user()->id) {
          return redirect()->back()->with('error', 'Akses ditolak');
      }

      $wilayah = Wilayah::orderBy('nama', 'asc')->get();
      return view('user.umkm-edit')
          ->with('wilayah', $wilayah)
          ->with('item', $item);
  }

  public function update(Request $req, $id) {
      $data = UMKM::find($id);

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
              File::delete('uploads/umkm/'. $data->foto);
              File::delete('uploads/umkm/thumbs/'. $data->foto);
              $filenameToStore = $originalName . '_' . time() . '.' . $ext;
              $req->file('foto')->move(public_path('uploads/umkm'), $filenameToStore);
              Helper::generateThumbnail('uploads/umkm', $filenameToStore);
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
          return redirect(route('umkm'))->with('success', 'Berhasil mengubah data.');
      }else{
          return redirect()->back()->with('error', 'Gagal menambah data');
      }
  }

  public function add() {
      $wilayah = Wilayah::orderBy('nama', 'asc')->get();
    return view('user.umkm-add')->with('wilayah', $wilayah);
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
              $req->file('foto')->move(public_path('uploads/umkm'), $filenameToStore);
              Helper::generateThumbnail('uploads/umkm', $filenameToStore);
          }
      }else{
          return redirect()->back()->with('error', 'Gambar tidak ditemukan');
      }

    $data = new UMKM;
      $data->nama = $req->input('nama');
      $data->alamat = $req->input('alamat');
      $data->latlng = $req->input('latlng');
      $data->id_wilayah = $req->input('wilayah');
      $data->deskripsi = $req->input('deskripsi');
      $data->id_pemilik = Auth::user()->id;
      $data->status = 'pending';
      $data->foto = $filenameToStore;

      if($data->save()) {
          return redirect(route('umkm'))->with('success', 'Entri berhasil ditambahkan. Menunggu verifikasi.');
      }else{
          return redirect()->back()->with('error', 'Gagal menambah data');
      }
  }
}

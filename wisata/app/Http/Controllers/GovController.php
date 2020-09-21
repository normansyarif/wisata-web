<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gov;
use App\Wilayah;

class GovController extends Controller
{
  public function __construct() {
    $this->middleware('admin');
  }

  public function index() {
      $gov = Gov::all();
      return view('admin.gov')->with('gov', $gov);
  }

  public function add() {
      $wilayah = Wilayah::all();
      return view('admin.gov-add')->with('wilayah', $wilayah);
  }

  public function insert(Request $req) {
      $gov = new Gov;

      $gov->wilayah_id = $req->input('wilayah');
      $gov->latlng = $req->input('latlng');
      $gov->deskripsi = $req->input('deskripsi');

      if($gov->save()) {
          return redirect(route('admin.gov'))->with('success', 'Berhasil menambahkan gov');
      }else{
          return redirect()->back()->with('error', 'Gagal menambahkan gov');
      }
  }

  public function edit($id) {
      $wilayah = Wilayah::all();
      $gov = Gov::find($id);
      return view('admin.gov-edit')->with('gov', $gov)->with('wilayah', $wilayah);
  }

  public function update(Request $req, $id) {
      $gov = Gov::find($id);

      $gov->wilayah_id = $req->input('wilayah');
      $gov->latlng = $req->input('latlng');
      $gov->deskripsi = $req->input('deskripsi');

      if($gov->save()) {
          return redirect(route('admin.gov'))->with('success', 'Berhasil mengubah gov');
      }else{
          return redirect()->back()->with('error', 'Gagal mengubah gov');
      }
  }

  public function delete($id) {
      $gov = Gov::find($id);

      if($gov->delete()) {
          return redirect()->back()->with('success', 'Berhasil menghapus gov');
      }else{
          return redirect()->back()->with('error', 'Gagal menghapus gov');
      }
  }
}

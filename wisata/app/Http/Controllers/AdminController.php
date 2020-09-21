<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Statistik;
use App\Homestay;
use App\Souvenir;
use App\Guide;
use App\Art;
use App\RM;
use App\Tani;
use App\UMKM;
use App\Kendaraan;
use App\Slider;
use File;
use App\Wilayah;
use App\Destinasi;
use App\Event;
use App\Pesan;
use App\User;
use App\Classes\Helper;

class AdminController extends Controller
{
    private $allowedExt = ["jpg", "png", "jpeg", "svg"];

	   public function __construct() {
        $this->middleware('admin');
    }

    //------------------
    // SLIDER
    //------------------
    public function sliderIndex() {
        $slider = Slider::orderBy('title')->get();
        return view('admin.slider')->with('slider', $slider);
    }

    public function sliderDelete($id) {
        $slider = Slider::find($id);
        File::delete('uploads/slider/'. $slider->foto);

        if($slider->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus slider');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus slider');
        }
    }

    public function sliderEdit($id) {
        $slider = Slider::find($id);
        return view('admin.slider-edit')->with('slider', $slider);
    }

    public function sliderUpdate(Request $req, $id) {
        $slider = Slider::find($id);

        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/slider/'. $slider->foto);
                $filenameToStore = time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/slider'), $filenameToStore);
            }
        }else{
            $filenameToStore = $slider->foto;
        }

        $slider->title = $req->input('title');
        $slider->subtitle = $req->input('subtitle');
        $slider->warna = $req->input('warna');
        $slider->foto = $filenameToStore;

        if($slider->save()) {
            return redirect(route('admin.slider'))->with('success', 'Berhasil mengubah slider');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah slider');
        }
    }

    public function sliderAdd() {
        return view('admin.slider-add');
    }

    public function sliderInsert(Request $req) {
        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                $filenameToStore = time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/slider'), $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        $slider = new Slider;
        $slider->title = $req->input('title');
        $slider->subtitle = $req->input('subtitle');
        $slider->warna = $req->input('warna');
        $slider->foto = $filenameToStore;

        if($slider->save()) {
            return redirect(route('admin.slider'))->with('success', 'Berhasil menambah slider');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah slider');
        }
    }
    // !- End slider


    //------------------
    // USAHA
    //------------------
    public function progressIndex() {
        $homestay = Homestay::where('status', 'pending')->get();
        $souvenir = Souvenir::where('status', 'pending')->get();
        $guide = Guide::where('status', 'pending')->get();
        $art = Art::where('status', 'pending')->get();
        $rm = RM::where('status', 'pending')->get();
        $tani = Tani::where('status', 'pending')->get();
        $umkm = UMKM::where('status', 'pending')->get();
        $kendaraan = Kendaraan::where('status', 'pending')->get();
    	return view('admin.progress')
            ->with('homestay', $homestay)
            ->with('souvenir', $souvenir)
            ->with('guide', $guide)
            ->with('art', $art)
            ->with('rm', $rm)
            ->with('tani', $tani)
            ->with('umkm', $umkm)
            ->with('kendaraan', $kendaraan);
    }

    public function approvedIndex() {
    	$homestay = Homestay::where('status', 'approved')->get();
        $souvenir = Souvenir::where('status', 'approved')->get();
        $guide = Guide::where('status', 'approved')->get();
        $art = Art::where('status', 'approved')->get();
        $rm = RM::where('status', 'approved')->get();
        $tani = Tani::where('status', 'approved')->get();
        $umkm = UMKM::where('status', 'approved')->get();
        $kendaraan = Kendaraan::where('status', 'approved')->get();
        return view('admin.approved')
            ->with('homestay', $homestay)
            ->with('souvenir', $souvenir)
            ->with('guide', $guide)
            ->with('art', $art)
            ->with('rm', $rm)
            ->with('tani', $tani)
            ->with('umkm', $umkm)
            ->with('kendaraan', $kendaraan);
    }

    public function rejectedIndex() {
    	$homestay = Homestay::where('status', 'rejected')->get();
        $souvenir = Souvenir::where('status', 'rejected')->get();
        $guide = Guide::where('status', 'rejected')->get();
        $art = Art::where('status', 'rejected')->get();
        $rm = RM::where('status', 'rejected')->get();
        $tani = Tani::where('status', 'rejected')->get();
        $umkm = UMKM::where('status', 'rejected')->get();
        $kendaraan = Kendaraan::where('status', 'kendaraan')->get();
        return view('admin.rejected')
            ->with('homestay', $homestay)
            ->with('souvenir', $souvenir)
            ->with('guide', $guide)
            ->with('art', $art)
            ->with('rm', $rm)
            ->with('tani', $tani)
            ->with('umkm', $umkm)
            ->with('kendaraan', $kendaraan);
    }

    public function homestayView($id) {
        $homestay = Homestay::find($id);
        return view('admin.view-homestay')->with('homestay', $homestay);
    }

    public function homestayDelete($id) {
        $homestay = Homestay::find($id);
        File::delete('uploads/homestay/'. $homestay->foto);
        File::delete('uploads/homestay/thumbs/'. $homestay->foto);
        if($homestay->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus homestay');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus homestay');
        }
    }

    public function homestayAccept($id) {
        $homestay = Homestay::find($id);
        $homestay->status = 'approved';

        if($homestay->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui homestay');
        }else{
            return redirect(route('admin.homestay', $id))->with('error', 'Gagal menyetujui homestay');
        }
    }

    public function homestayReject(Request $req, $id) {
        $homestay = Homestay::find($id);
        $homestay->status = 'rejected';
        $homestay->alasan_tolak = $req->input('alasan');

        if($homestay->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak homestay');
        }else{
            return redirect(route('admin.homestay', $id))->with('error', 'Gagal menolak homestay');
        }
    }

    public function souvenirView($id) {
        $souvenir = Souvenir::find($id);
        return view('admin.view-souvenir')->with('souvenir', $souvenir);
    }

    public function souvenirDelete($id) {
        $souvenir = Souvenir::find($id);
        File::delete('uploads/souvenir/'. $souvenir->foto);
        File::delete('uploads/souvenir/thumbs/'. $souvenir->foto);
        if($souvenir->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus souvenir');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus souvenir');
        }
    }

    public function souvenirAccept($id) {
        $souvenir = Souvenir::find($id);
        $souvenir->status = 'approved';

        if($souvenir->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui souvenir');
        }else{
            return redirect(route('admin.souvenir', $id))->with('error', 'Gagal menyetujui souvenir');
        }
    }

    public function souvenirReject(Request $req, $id) {
        $souvenir = Souvenir::find($id);
        $souvenir->status = 'rejected';
        $souvenir->alasan_tolak = $req->input('alasan');

        if($souvenir->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak souvenir');
        }else{
            return redirect(route('admin.souvenir', $id))->with('error', 'Gagal menolak souvenir');
        }
    }

    public function artView($id) {
        $art = Art::find($id);
        return view('admin.view-art')->with('art', $art);
    }

    public function artDelete($id) {
        $art = Art::find($id);
        File::delete('uploads/art/'. $art->foto);
        File::delete('uploads/art/thumbs/'. $art->foto);
        if($art->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus kelompok seni');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus kelompok seni');
        }
    }

    public function artAccept($id) {
        $art = Art::find($id);
        $art->status = 'approved';

        if($art->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui kelompok seni');
        }else{
            return redirect(route('admin.art', $id))->with('error', 'Gagal menyetujui kelompok seni');
        }
    }

    public function artReject(Request $req, $id) {
        $art = Art::find($id);
        $art->status = 'rejected';
        $art->alasan_tolak = $req->input('alasan');

        if($art->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak kelompok seni');
        }else{
            return redirect(route('admin.art', $id))->with('error', 'Gagal menolak kelompok seni');
        }
    }

    public function guideView($id) {
        $guide = Guide::find($id);
        return view('admin.view-guide')->with('guide', $guide);
    }

    public function guideDelete($id) {
        $guide = Guide::find($id);
        if($guide->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus tour guide');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus tour guide');
        }
    }

    public function guideAccept($id) {
        $guide = Guide::find($id);
        $guide->status = 'approved';

        if($guide->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui tour guide');
        }else{
            return redirect(route('admin.guide', $id))->with('error', 'Gagal menyetujui tour guide');
        }
    }

    public function guideReject(Request $req, $id) {
        $guide = Guide::find($id);
        $guide->status = 'rejected';
        $guide->alasan_tolak = $req->input('alasan');

        if($guide->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak tour guide');
        }else{
            return redirect(route('admin.guide', $id))->with('error', 'Gagal menolak tour guide');
        }
    }



    // UPDATE //
    //------------

    public function rmView($id) {
        $data = RM::find($id);
        return view('admin.view-rm')->with('data', $data);
    }

    public function rmDelete($id) {
        $data = RM::find($id);
        File::delete('uploads/rm/'. $data->foto);
        File::delete('uploads/rm/thumbs/'. $data->foto);
        if($data->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function rmAccept($id) {
        $data = RM::find($id);
        $data->status = 'approved';

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui data');
        }else{
            return redirect(route('admin.rm', $id))->with('error', 'Gagal menyetujui data');
        }
    }

    public function rmReject(Request $req, $id) {
        $data = RM::find($id);
        $data->status = 'rejected';
        $data->alasan_tolak = $req->input('alasan');

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak data');
        }else{
            return redirect(route('admin.rm', $id))->with('error', 'Gagal menolak data');
        }
    }




    public function taniView($id) {
        $data = Tani::find($id);
        return view('admin.view-tani')->with('data', $data);
    }

    public function taniDelete($id) {
        $data = Tani::find($id);
        File::delete('uploads/tani/'. $data->foto);
        File::delete('uploads/tani/thumbs/'. $data->foto);
        if($data->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function taniAccept($id) {
        $data = Tani::find($id);
        $data->status = 'approved';

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui data');
        }else{
            return redirect(route('admin.tani', $id))->with('error', 'Gagal menyetujui data');
        }
    }

    public function taniReject(Request $req, $id) {
        $data = Tani::find($id);
        $data->status = 'rejected';
        $data->alasan_tolak = $req->input('alasan');

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak data');
        }else{
            return redirect(route('admin.tani', $id))->with('error', 'Gagal menolak data');
        }
    }


    public function umkmView($id) {
        $data = UMKM::find($id);
        return view('admin.view-umkm')->with('data', $data);
    }

    public function umkmDelete($id) {
        $data = UMKM::find($id);
        File::delete('uploads/umkm/'. $data->foto);
        File::delete('uploads/umkm/thumbs/'. $data->foto);
        if($data->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function umkmAccept($id) {
        $data = UMKM::find($id);
        $data->status = 'approved';

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui data');
        }else{
            return redirect(route('admin.umkm', $id))->with('error', 'Gagal menyetujui data');
        }
    }

    public function umkmReject(Request $req, $id) {
        $data = UMKM::find($id);
        $data->status = 'rejected';
        $data->alasan_tolak = $req->input('alasan');

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak data');
        }else{
            return redirect(route('admin.umkm', $id))->with('error', 'Gagal menolak data');
        }
    }



    public function kendaraanView($id) {
        $data = Kendaraan::find($id);
        return view('admin.view-kendaraan')->with('data', $data);
    }

    public function kendaraanDelete($id) {
        $data = Kendaraan::find($id);
        File::delete('uploads/kendaraan/'. $data->foto);
        File::delete('uploads/kendaraan/thumbs/'. $data->foto);
        if($data->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function kendaraanAccept($id) {
        $data = Kendaraan::find($id);
        $data->status = 'approved';

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menyetujui data');
        }else{
            return redirect(route('admin.kendaraan', $id))->with('error', 'Gagal menyetujui data');
        }
    }

    public function kendaraanReject(Request $req, $id) {
        $data = Kendaraan::find($id);
        $data->status = 'rejected';
        $data->alasan_tolak = $req->input('alasan');

        if($data->save()) {
            return redirect(route('admin.progress'))->with('success', 'Berhasil menolak data');
        }else{
            return redirect(route('admin.kendaraan', $id))->with('error', 'Gagal menolak data');
        }
    }




    // !- End usaha


    //------------------
    // WILAYAH
    //------------------
    public function wilayahIndex() {
        $wilayah = Wilayah::orderBy('nama')->get();
        return view('admin.wilayah')->with('wilayah', $wilayah);
    }

    public function wilayahDelete($id) {
        $wilayah = Wilayah::find($id);

        $homestay = Homestay::where('id_wilayah', $id);
        foreach($homestay->get() as $h) {
            File::delete('uploads/homestay/'. $h->foto);
            File::delete('uploads/homestay/thumbs/'. $h->foto);
        }
        $homestay->delete();

        $souvenir = Souvenir::where('id_wilayah', $id);
        foreach($souvenir->get() as $s) {
            File::delete('uploads/souvenir/'. $s->foto);
            File::delete('uploads/souvenir/thumbs/'. $s->foto);
        }
        $souvenir->delete();

        $art = Art::where('id_wilayah', $id);
        foreach($art->get() as $a) {
            File::delete('uploads/art/'. $a->foto);
            File::delete('uploads/art/thumbs/'. $s->foto);
        }
        $art->delete();

        $guide = Guide::where('id_wilayah', $id);
        $guide->delete();

        File::delete('uploads/wilayah/'. $wilayah->foto);
        File::delete('uploads/wilayah/thumbs/'. $wilayah->foto);

        if($wilayah->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus wilayah');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus wilayah');
        }
    }

    public function wilayahEdit($id) {
        $wilayah = Wilayah::find($id);
        return view('admin.wilayah-edit')->with('wilayah', $wilayah);
    }

    public function wilayahUpdate(Request $req, $id) {
        $wilayah = Wilayah::find($id);

        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/wilayah/'. $wilayah->foto);
                File::delete('uploads/wilayah/thumbs/'. $wilayah->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/wilayah'), $filenameToStore);
                Helper::generateThumbnail('uploads/wilayah', $filenameToStore);
            }
        }else{
            $filenameToStore = $wilayah->foto;
        }

        $wilayah->nama = $req->input('nama');
        $wilayah->foto = $filenameToStore;
        $wilayah->latlang = $req->input('latlang');
        $wilayah->deskripsi = $req->input('deskripsi');
        $wilayah->narasi = $req->input('narasi');
        $wilayah->youtube = $req->input('youtube');

        if($wilayah->save()) {
            return redirect(route('admin.wilayah'))->with('success', 'Berhasil mengubah wilayah');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah wilayah');
        }
    }

    public function wilayahAdd() {
        return view('admin.wilayah-add');
    }

    public function wilayahInsert(Request $req) {
        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/wilayah'), $filenameToStore);
                Helper::generateThumbnail('uploads/wilayah', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        $wilayah = new Wilayah;
        $wilayah->nama = $req->input('nama');
        $wilayah->foto = $filenameToStore;
        $wilayah->latlang = $req->input('latlang');
        $wilayah->narasi = $req->input('narasi');
        $wilayah->youtube = $req->input('youtube');
        $wilayah->deskripsi = $req->input('deskripsi');

        if($wilayah->save()) {
            return redirect(route('admin.wilayah'))->with('success', 'Berhasil menambah wilayah');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah wilayah');
        }
    }
    // !- End Wilayah


    //------------------
    // DESTINASI
    //------------------
    public function destinasiIndex() {
        $destinasi = Destinasi::orderBy('nama')->get();
        return view('admin.destinasi')->with('destinasi', $destinasi);
    }

    public function destinasiDelete($id) {
        $destinasi = Destinasi::find($id);
        File::delete('uploads/destinasi/'. $destinasi->foto);
        File::delete('uploads/destinasi/thumbs/'. $destinasi->foto);
        if($destinasi->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus destinasi');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus destinasi');
        }
    }

    public function destinasiEdit($id) {
        $destinasi = Destinasi::find($id);
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('admin.destinasi-edit')
            ->with('destinasi', $destinasi)
            ->with('wilayah', $wilayah);
    }

    public function destinasiUpdate(Request $req, $id) {
        $destinasi = Destinasi::find($id);

        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/destinasi/'. $destinasi->foto);
                File::delete('uploads/destinasi/thumbs/'. $destinasi->foto);
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/destinasi'), $filenameToStore);
                Helper::generateThumbnail('uploads/destinasi', $filenameToStore);
            }
        }else{
            $filenameToStore = $destinasi->foto;
        }

        $destinasi->nama = $req->input('nama');
        $destinasi->alamat = $req->input('alamat');
        $destinasi->plus_code = $req->input('plus-code');
        $destinasi->deskripsi = $req->input('deskripsi');
        $destinasi->id_wilayah = $req->input('wilayah');
        $destinasi->foto = $filenameToStore;

        if($destinasi->save()) {
            return redirect(route('admin.destinasi'))->with('success', 'Berhasil mengubah destinasi');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah destinasi');
        }
    }

    public function destinasiAdd() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('admin.destinasi-add')->with('wilayah', $wilayah);
    }

    public function destinasiInsert(Request $req) {
        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/destinasi'), $filenameToStore);
                Helper::generateThumbnail('uploads/destinasi', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        $destinasi = new Destinasi;
        $destinasi->nama = $req->input('nama');
        $destinasi->alamat = $req->input('alamat');
        $destinasi->plus_code = $req->input('plus-code');
        $destinasi->deskripsi = $req->input('deskripsi');
        $destinasi->id_wilayah = $req->input('wilayah');
        $destinasi->foto = $filenameToStore;

        if($destinasi->save()) {
            return redirect(route('admin.destinasi'))->with('success', 'Berhasil menambah destinasi');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah destinasi');
        }
    }
    // !- End destinasi


    //------------------
    // EVENT
    //------------------
    public function eventIndex() {
        $event = Event::orderBy('nama')->get();
        return view('admin.event')->with('event', $event);
    }

    public function eventDelete($id) {
        $event = Event::find($id);
        File::delete('uploads/event/'. $event->foto);
        File::delete('uploads/event/thumbs/'. $event->foto);
        if($event->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus event');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus event');
        }
    }

    public function eventEdit($id) {
        $event = Event::find($id);
        $wilayah = Wilayah::orderBy('nama','asc')->get();
        return view('admin.event-edit')
            ->with('wilayah', $wilayah)
            ->with('event', $event);
    }

    public function eventUpdate(Request $req, $id) {
        $event = Event::find($id);

        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                File::delete('uploads/event/'. $event->foto);
                File::delete('uploads/event/thumbs/'. $event->foto);
                $filenameToStore = time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/event'), $filenameToStore);
                Helper::generateThumbnail('uploads/event', $filenameToStore);
            }
        }else{
            $filenameToStore = $event->foto;
        }

        $event->nama = $req->input('nama');
        $event->lokasi = $req->input('lokasi');
        $event->latlng = $req->input('latlng');
        $event->start = strtotime($req->input('start'));
        $event->end = strtotime($req->input('end'));
        $event->deskripsi = $req->input('deskripsi');
        $event->id_wilayah = $req->input('wilayah');
        $event->foto = $filenameToStore;

        if($event->save()) {
            return redirect(route('admin.event'))->with('success', 'Berhasil mengubah event');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah event');
        }
    }

    public function eventAdd() {
        $wilayah = Wilayah::orderBy('nama', 'asc')->get();
        return view('admin.event-add')->with('wilayah', $wilayah);
    }

    public function eventInsert(Request $req) {
        if($req->hasFile('foto')) {
            $ext = strtolower($req->file('foto')->getClientOriginalExtension());
            $originalName = $req->file('foto')->getClientOriginalName();
            $originalName = pathinfo($originalName, PATHINFO_FILENAME);
            if(!in_array($ext, $this->allowedExt)) {
                return redirect()->back()->with('error', 'Format gambar tidak didukung');
            }else{
                $filenameToStore = $originalName . '_' . time() . '.' . $ext;
                $req->file('foto')->move(public_path('uploads/event'), $filenameToStore);
                Helper::generateThumbnail('uploads/event', $filenameToStore);
            }
        }else{
            return redirect()->back()->with('error', 'Gambar tidak ditemukan');
        }

        $event = new Event;
        $event->nama = $req->input('nama');
        $event->lokasi = $req->input('lokasi');
        $event->latlng = $req->input('latlng');
        $event->start = strtotime($req->input('start'));
        $event->end = strtotime($req->input('end'));
        $event->deskripsi = $req->input('deskripsi');
        $event->id_wilayah = $req->input('wilayah');
        $event->foto = $filenameToStore;

        if($event->save()) {
            return redirect(route('admin.event'))->with('success', 'Berhasil menambah event');
        }else{
            return redirect()->back()->with('error', 'Gagal menambah event');
        }
    }
    // !- End event



    //----------------
    // USERS
    //----------------
    public function userIndex() {
        $users = User::orderBy('name', 'asc')->get();
        return view('admin.users')->with('users', $users);
    }

    public function userView($id) {
        $user = User::find($id);
        return view('admin.view-user')->with('user', $user);
    }

    public function userDelete($id) {
        $homestay = Homestay::where('id_pemilik', $id);
        foreach($homestay->get() as $h) {
            File::delete('uploads/homestay/'. $h->foto);
        }
        $homestay->delete();

        $souvenir = Souvenir::where('id_pemilik', $id);
        foreach($souvenir->get() as $s) {
            File::delete('uploads/souvenir/'. $s->foto);
        }
        $souvenir->delete();

        $art = Art::where('id_pemilik', $id);
        foreach($art->get() as $a) {
            File::delete('uploads/art/'. $a->foto);
        }
        $art->delete();

        $guide = Guide::where('id_pemilik', $id);
        $guide->delete();

        $user = User::find($id);
        File::delete('uploads/profile/'. $user->foto);
        if($user->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus pengguna');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus pengguna');
        }
    }


    //---------------
    // MESSAGES
    //---------------
    public function messageIndex() {
        $pesan = Pesan::orderBy('created_at', 'desc')->get();
        return view('admin.pesan')->with('pesan', $pesan);
    }

    public function messageDelete($id) {
        $pesan = Pesan::find($id);
        if($pesan->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus pesan');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus pesan');
        }
    }

    // statistik

    public function statistikIndex() {
        $wilayah = Wilayah::orderBy('nama')->get();
        return view('admin.statistik-index')->with('wilayah', $wilayah);
    }

    public function statistikView($id) {
        $wilayah = Wilayah::find($id);
        $statistik = Statistik::where('id_wilayah', $id)->orderBy('id', 'DESC')->get();
        return view('admin.statistik-view', ['wilayah' => $wilayah, 'statistik' => $statistik]);
    }

    public function statistikAdd() {
        $wilayah = Wilayah::orderBy('nama')->get();
        return view('admin.statistik-add')->with('wilayah', $wilayah);
    }

    public function statistikInsert(Request $req) {
        $statistik = new Statistik;
        $statistik->label = $req->input('label');
        $statistik->value = $req->input('value');
        $statistik->id_wilayah = $req->input('wilayah');

        if($statistik->save()) {
            return redirect(route('admin.statistikView', $statistik->id_wilayah))->with('success', 'Berhasil menambah statistik');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah event');
        }
    }

    public function statistikEdit($id) {
        $statistik = Statistik::find($id);
        $wilayah = Wilayah::orderBy('nama','asc')->get();
        return view('admin.statistik-edit')
            ->with('wilayah', $wilayah)
            ->with('statistik', $statistik);
    }

    public function statistikUpdate(Request $req, $id) {
        $statistik = Statistik::find($id);
        $statistik->label = $req->input('label');
        $statistik->value = $req->input('value');
        $statistik->id_wilayah = $req->input('wilayah');

        if($statistik->save()) {
            return redirect(route('admin.statistikView', $statistik->id_wilayah))->with('success', 'Berhasil memperbarui statistik');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah event');
        }
    }

    public function statistikDelete($id) {
        $statistik = Statistik::find($id);
        if($statistik->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus statistik');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus statistik');
        }
    }
}

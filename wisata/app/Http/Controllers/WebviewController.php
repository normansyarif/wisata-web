<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statistik;
use App\Wilayah;
use App\Destinasi;
use App\DestinasiReview;
use App\Event;
use App\Homestay;
use App\HomestayReview;
use App\Art;
use App\ArtReview;
use App\Souvenir;
use App\SouvenirReview;
use App\Guide;
use App\GuideReview;
use App\Tani;
use App\Kendaraan;
use App\UMKM;
use App\RM;
use App\TaniReview;
use App\KendaraanReview;
use App\UMKMReview;
use App\RMReview;
use App\Bumdes;
use App\Gov;

class WebviewController extends Controller
{
    public function wilayahIndex() {
    	$wilayah = Wilayah::orderBy('nama', 'asc')->get();
    	return view('webview.wilayah-index')->with('wilayah', $wilayah);
    }

    public function wilayahMap() {
    	$wilayahArr = Wilayah::orderBy('nama', 'asc')->get()->toArray();
    	$wilayah = array();
    	foreach ($wilayahArr as $w) {
    		$latlang = explode(',', $w['latlang']);
    		$data["id"] = $w['id'];
    		$data["name"] = $w['nama'];
    		$data["profileImage"] = url('uploads/wilayah/' . $w['foto']) ;
    		$data["pos"] = [$latlang[0], $latlang[1]];
    		$data["contentString"] = $w['deskripsi'];
    		array_push($wilayah, $data);
    	}
    	return view('webview.wilayah-map')->with('wilayah', json_encode($wilayah));
    }

    public function wilayahContent($type, $id_wilayah) {
      switch ($type) {
          case 'homestay':
            $contentArr = Homestay::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case 'event':
            $contentArr = Event::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case 'souvenir':
            $contentArr = Souvenir::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case 'art':
            $contentArr = Art::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case "rm":
            $contentArr = RM::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case "tani":
            $contentArr = Tani::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case "umkm":
            $contentArr = UMKM::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          case "kendaraan":
            $contentArr = kendaraan::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
          default:
            $contentArr = Destinasi::where('id_wilayah', $id_wilayah)->get()->toArray();
            break;
        }

      $content = array();
      foreach ($contentArr as $w) {
        $latlang = explode(',', $w['latlang']);
        $data["id"] = $w['id'];
        $data["name"] = $w['nama'];
        $data["profileImage"] = url('uploads/'.$type.'/' . $w['foto']) ;
        $data["pos"] = [$latlang[0], $latlang[1]];

        if(isset($w['alamat'])) $data["contentString"] = $w['alamat'];
        else if(isset($w['lokasi'])) $data["contentString"] = $w['lokasi'];
        else $data["contentString"] = $w['deskripsi'];

        array_push($content, $data);
      }

      return view('webview.wilayah-content')->with('content', json_encode($content))->with('type', $type);
    }

    public function list(Request $req) {
        $type = $req->input('type');
        $id = $req->input('id');

        return view('webview.list')
            ->with('type', $type)
            ->with('id', $id);
    }

    public function review(Request $req) {
        $type = $req->input('type');
        $id = $req->input('id');
        return view('webview.review')
            ->with('type', $type)
            ->with('id', $id);
    }

    public function wilayahSelect(Request $req) {
        $id = $req->input('id');
        $wilayah = Wilayah::find($id);
        $event = Event::where('id_wilayah', $id)->where('end', '>', time())->orderBy('end', 'asc')->take(10)->get();
        $statistik = Statistik::where('id_wilayah', $id)->orderBy('id', 'DESC')->get();

        return view('webview.wilayah-select')
            ->with('namaWilayah', $wilayah->nama)
            ->with('id', $id)
            ->with('narasi', $wilayah->narasi)
            ->with('youtube', $wilayah->youtube)
            ->with('statistik', $statistik)
            ->with('event', $event);
    }


    //-----------------
    // AJAX
    //-----------------
    public function ajaxList(Request $req) {
        $id = $req->input('id');
        $type = $req->input('type');

        if($req->input('offset')) {
            $offset = $req->input('offset');
        }else{
            $offset = 0;
        }

        $keyword = $req->input('keyword');
        $limit = 20;

        if($type == 'destinasi') {
            $data = Destinasi::where('nama', 'like', '%' . $keyword . '%')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.destinasi')->with('data', $data)->with('end', $end);
        }elseif($type == 'event') {
            $data = Event::where('nama', 'like', '%' . $keyword . '%')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.event')->with('data', $data)->with('end', $end);
        }elseif($type == 'homestay') {
            $data = Homestay::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.homestay')->with('data', $data)->with('end', $end);
        }elseif($type == 'art') {
            $data = Art::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.art')->with('data', $data)->with('end', $end);
        }elseif($type == 'souvenir') {
            $data = Souvenir::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.souvenir')->with('data', $data)->with('end', $end);
        }elseif($type == 'guide') {
            $data = Guide::whereHas('user', function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')->where('status', 'approved');
            })->where('id_wilayah', $id)->skip($offset)->take($limit)->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.guide')->with('data', $data)->with('end', $end);
        }elseif($type == 'rm') {
            $data = RM::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.rm')->with('data', $data)->with('end', $end);
        }elseif($type == 'tani') {
            $data = Tani::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.tani')->with('data', $data)->with('end', $end);
        }elseif($type == 'umkm') {
            $data = UMKM::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.umkm')->with('data', $data)->with('end', $end);
        }elseif($type == 'kendaraan') {
            $data = Kendaraan::where('nama', 'like', '%' . $keyword . '%')->where('status', 'approved')->where('id_wilayah', $id)->skip($offset)->take($limit)->orderBy('nama', 'asc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

            return view('ajax.kendaraan')->with('data', $data)->with('end', $end);
        }else{
            return 'Type not specified';
        }

    }

    public function ajaxReview(Request $req) {
        $type = $req->input('type');
        $id = $req->input('id');
        $offset = $req->input('offset');

        $limit = 20;

        if($type == 'destinasi') {
            $data = DestinasiReview::where('id_destinasi', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'homestay') {
            $data = HomestayReview::where('id_homestay', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'souvenir') {
            $data = SouvenirReview::where('id_souvenir', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'art') {
            $data = ArtReview::where('id_seni', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'guide') {
            $data = GuideReview::where('id_guide', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'rm') {
            $data = RMReview::where('id_rumah_makan', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'tani') {
            $data = TaniReview::where('id_tani', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'umkm') {
            $data = UMKMReview::where('id_umkm', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }elseif($type == 'kendaraan') {
            $data = KendaraanReview::where('id_kendaraan', $id)->skip($offset)->take($limit)->orderBy('created_at', 'desc')->get();

            if(count($data) < $limit) $end = "true";
            else $end = "false";

        }

        return view('ajax.review')->with('data', $data)->with('end', $end);
    }

    public function mpWebview($type, $id) {
        $data = null;
        $label = "";
        if($type == 'bumdes') {
            $data = Bumdes::where('wilayah_id', $id)->first();
            $label = 'Bumdes';
        }else if($type == 'gov') {
            $data = Gov::where('wilayah_id', $id)->first();
            $label = 'Pemerintahan';
        }
        if(!$data) {
            return 'No data';
        }else{
            return view('webview.wv')->with('data', $data)->with('label', $label);
        }

    }

    public function deskripsi($type, $id){
      $data = null;
      if($type == 'souvenir') {
          $data = Souvenir::find($id);
      } elseif($type == 'art') {
          $data = Art::find($id);
      } elseif($type == 'rm') {
          $data = RM::find($id);
      } elseif($type == 'tani') {
          $data = Tani::find($id);
      } elseif($type == 'umkm') {
          $data = UMKM::find($id);
      } elseif($type == 'kendaraan') {
          $data = Kendaraan::find($id);
      }

      if(!$data) return 'No data';
      return view('webview.textOnly')->with('data', $data->deskripsi);
    }
}

<?php

namespace App\Http\Controllers;

use App\Pesan;
use App\DestinasiReview;
use App\GuideReview;
use App\ArtReview;
use App\HomestayReview;
use App\SouvenirReview;
use App\TaniReview;
use App\UMKMReview;
use App\RMReview;
use App\KendaraanReview;
use Illuminate\Http\Request;

header("Content-type:application/json");

class APISendMessage extends Controller
{
    public function rating(Request $request){
      $type   = $request->type;
      if($type == "destinasi"){
        $review = new DestinasiReview();
        $review->id_destinasi = $request->id;
      } else if($type == "guide"){
        $review = new GuideReview();
        $review->id_guide = $request->id;
      } else if($type == "art"){
        $review = new ArtReview();
        $review->id_seni = $request->id;
      } else if($type == "homestay"){
        $review = new HomestayReview();
        $review->id_homestay = $request->id;
      }else if($type == "tani"){
        $review = new TaniReview();
        $review->id_tani = $request->id;
      }else if($type == "rm"){
        $review = new RMReview();
        $review->id_rumah_makan = $request->id;
      }else if($type == "umkm"){
        $review = new UMKMReview();
        $review->id_umkm = $request->id;
      }else if($type == "kendaraan"){
        $review = new KendaraanReview();
        $review->id_kendaraan = $request->id;
      } else{
        $review = new SouvenirReview();
        $review->id_souvenir = $request->id;
      }

      $review->nama = $request->nama;
      $review->komentar = $request->ulasan;
      $review->rating   = $request->rating;

      if($review->save()) echo 1;
    }

    public function kontakAdmin(Request $request){
      $msg = new Pesan();
      $msg->nama  = $request->nama;
      $msg->email = $request->email;
      $msg->judul = $request->judul;
      $msg->pesan = $request->pesan;
      if($msg->save()) echo 1;
    }
}

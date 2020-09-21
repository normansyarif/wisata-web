<?php

namespace App\Http\Controllers;

use App\Destinasi;
use App\Event;
use App\Homestay;
use App\Art;
use App\Souvenir;
use App\Guide;
use App\RM;
use App\UMKM;
use App\Kendaraan;
use App\Tani;
use Illuminate\Http\Request;

header("Content-type:application/json");

class APIDetailContent extends Controller
{
    public function getDestinasi($id){
      $destinasi  = Destinasi::find($id);
      $destinasi->wilayah = $destinasi->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($destinasi->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $destinasi->orang   = $orang;
      $destinasi->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);
      echo json_encode($destinasi);
    }

    public function getHomestay($id){
      $homestay = Homestay::find($id);
      $homestay->wilayah = $homestay->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($homestay->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $homestay->orang   = $orang;
      $homestay->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $homestay->email = $homestay->user()->first()->email;
      $homestay->wa    = $homestay->user()->first()->wa;
      $homestay->hp    = $homestay->user()->first()->hp;
      echo json_encode($homestay);
    }

    public function getArt($id){
      $art = Art::find($id);
      $art->wilayah = $art->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($art->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $art->orang   = $orang;
      $art->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $art->email = $art->user()->first()->email;
      $art->wa    = $art->user()->first()->wa;
      $art->hp    = $art->user()->first()->hp;
      echo json_encode($art);
    }

    public function getSouvenir($id){
      $souvenir = Souvenir::find($id);
      $souvenir->wilayah = $souvenir->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($souvenir->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $souvenir->orang   = $orang;
      $souvenir->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $souvenir->email = $souvenir->user()->first()->email;
      $souvenir->wa    = $souvenir->user()->first()->wa;
      $souvenir->hp    = $souvenir->user()->first()->hp;
      echo json_encode($souvenir);
    }

    public function getGuide($id){
      $guide = Guide::find($id);
      $guide->wilayah = $guide->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($guide->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $guide->orang   = $orang;
      $guide->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $guide->nama  = $guide->user()->first()->name;
      $guide->foto  = $guide->user()->first()->foto;
      $guide->email = $guide->user()->first()->email;
      $guide->wa    = $guide->user()->first()->wa;
      $guide->hp    = $guide->user()->first()->hp;
      $guide->plus_code = $guide->user()->first()->plus_code;
      echo json_encode($guide);
    }

    public function getEvent($id){
      $event  = Event::find($id);
      $event->wilayah = $event->wilayah()->first()->nama;
      $event->tanggal = date("d M Y", $event->start);
      $event->waktu   = date("H:i", $event->start) . " - " . date("H:i", $event->end);
      echo json_encode($event);
    }

    public function getRM($id){
      $item = RM::find($id);
      $item->wilayah = $item->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($item->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $item->orang   = $orang;
      $item->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $item->email = $item->user()->first()->email;
      $item->wa    = $item->user()->first()->wa;
      $item->hp    = $item->user()->first()->hp;
      echo json_encode($item);
    }

    public function getTani($id){
      $item = Tani::find($id);
      $item->wilayah = $item->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($item->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $item->orang   = $orang;
      $item->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $item->email = $item->user()->first()->email;
      $item->wa    = $item->user()->first()->wa;
      $item->hp    = $item->user()->first()->hp;
      echo json_encode($item);
    }

    public function getUMKM($id){
      $item = UMKM::find($id);
      $item->wilayah = $item->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($item->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $item->orang   = $orang;
      $item->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $item->email = $item->user()->first()->email;
      $item->wa    = $item->user()->first()->wa;
      $item->hp    = $item->user()->first()->hp;
      echo json_encode($item);
    }

    public function getKendaraan($id){
      $item = Kendaraan::find($id);
      $item->wilayah = $item->wilayah()->first()->nama;

      $orang = 0;
      $totalRating = 0;
      foreach($item->reviews as $review){
          $orang++;
          $totalRating += $review->rating;
      };

      $item->orang   = $orang;
      $item->rating  = ($orang == 0) ? 0 : round($totalRating / $orang, 1);

      $item->email = $item->user()->first()->email;
      $item->wa    = $item->user()->first()->wa;
      $item->hp    = $item->user()->first()->hp;
      echo json_encode($item);
    }
}

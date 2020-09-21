<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
  protected $table = 'statistik';

  public function wilayah() {
    return $this->belongsTo('App\Wilayah', 'id_wilayah');
  }
}

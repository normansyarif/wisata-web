<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }

    public function reviews() {
    	return $this->hasMany('App\KendaraanReview', 'id_kendaraan');
    }
}

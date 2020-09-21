<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tani extends Model
{
    protected $table = 'produk_tani';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }

    public function reviews() {
    	return $this->hasMany('App\TaniReview', 'id_tani');
    }
}

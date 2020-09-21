<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    protected $table = 'umkm';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }

    public function reviews() {
    	return $this->hasMany('App\UMKMReview', 'id_umkm');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestay';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }

    public function reviews() {
    	return $this->hasMany('App\HomestayReview', 'id_homestay');
    }
}

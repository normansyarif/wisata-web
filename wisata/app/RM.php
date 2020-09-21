<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RM extends Model
{
    protected $table = 'rumah_makan';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }

    public function reviews() {
    	return $this->hasMany('App\RMReview', 'id_rumah_makan');
    }
}

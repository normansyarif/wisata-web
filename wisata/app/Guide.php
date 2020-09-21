<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = 'tour_guide';

    public function user() {
    	return $this->belongsTo('App\User', 'id_pemilik');
    }

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }

    public function reviews() {
    	return $this->hasMany('App\GuideReview', 'id_guide');
    }
}

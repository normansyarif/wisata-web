<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bumdes extends Model
{
    protected $table = 'bumdes';

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'wilayah_id');
    }
}

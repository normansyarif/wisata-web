<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gov extends Model
{
    protected $table = 'gov';

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'wilayah_id');
    }
}

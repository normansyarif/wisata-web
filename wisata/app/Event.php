<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    public function wilayah() {
    	return $this->belongsTo('App\Wilayah', 'id_wilayah');
    }
}

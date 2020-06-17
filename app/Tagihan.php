<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    protected $table = "tagihan";

    public function tagihan(){
    	return $this->belongsTo('App\Notadinas','notadinas_id');
    }
}

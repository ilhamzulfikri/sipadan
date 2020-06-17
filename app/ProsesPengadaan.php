<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProsesPengadaan extends Model
{
    //
    protected $table = "proses_pengadaan";

    public function notadinas(){
    	return $this->belongsTo('App\Notadinas','notadinas_id');
    }
}

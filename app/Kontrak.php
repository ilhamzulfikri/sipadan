<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    //
    protected $table = "kontrak";

    public function kontrak(){
    	return $this->belongsTo('App\Notadinas','notadinas_id');
    }
}

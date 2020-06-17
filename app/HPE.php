<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HPE extends Model
{
    //
    protected $table = "hpe";
 
    public function notadinas(){
    	return $this->belongsTo('App\Notadinas','notadinas_id');
    }
}

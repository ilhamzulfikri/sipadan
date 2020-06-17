<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProsesKontrak extends Model
{
    //
    protected $table = "notadinas";

    public function hpe(){
    	return $this->hasOne('App\HPE');
    }

    public function prosespengadaan(){
    	return $this->hasOne('App\ProsesPengadaan');
    }


}

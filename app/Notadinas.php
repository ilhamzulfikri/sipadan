<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notadinas extends Model
{
    //
    protected $table = "notadinas";

    public function hpe(){
    	return $this->hasOne('App\HPE');
    }

    public function prosespengadaan(){
    	return $this->hasOne('App\ProsesPengadaan');
    }

    public function kontrak(){
    	return $this->hasOne('App\Kontrak');
    }

    public function tagihan(){
        return $this->hasOne('App\Tagihan');
    }



}

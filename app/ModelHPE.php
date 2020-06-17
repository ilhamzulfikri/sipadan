<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHPE extends Model
{
    //
    protected $table = "hpe";
 
    public function ModelND(){
    	return $this->belongsTo('App\ModelND');
    }
}

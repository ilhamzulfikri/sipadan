<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelND extends Model
{
    //
    protected $table = "notadinas";

    public function ModelHPE(){
    	return $this->hasMany('App\HPE');
    }
}

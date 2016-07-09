<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //
    public function estado()
    {
    	return $this->belongsTo('App\Estado');
    }
  
    public function tenistas()
    {
    	return $this->hasMany('App\Tenista');
    }

     public function academias()
    {
    	return $this->hasMany('App\Academia');
    }
}

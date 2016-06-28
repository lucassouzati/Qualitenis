<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //
    public function estado()
    {
    	return $this->hasOne('App\Estado');
    }
    
    public function tenistas()
    {
    	return $this->belongsToMany('App\Tenista');
    }
}

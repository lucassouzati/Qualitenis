<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statustenista extends Model
{
    //
    public function tenistas()
    {
    	return $this->belongsToMany('App\Tenista');
    }
}

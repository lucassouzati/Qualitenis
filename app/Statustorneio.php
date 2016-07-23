<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statustorneio extends Model
{
    //
    public function torneios()
    {
    	return $this->hasMany('App\Torneio');
    }
}

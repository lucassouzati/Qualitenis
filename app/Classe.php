<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function tenistas()
    {
    	return $this->hasMany('App\Tenista');
    }

    public function chaveamentos()
    {
    	return $this->hasMany('App\Chaveamento');
    }
}

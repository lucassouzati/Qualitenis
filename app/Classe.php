<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function tenistas()
    {
    	return $this->hasMany('App\Tenista');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{	
	
    public function papels()
    {
    	return $this->belongsToMany(\App\Papel::class);
    }

   	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
	
   public function permissaos()
    {
    	return $this->belongsToMany(\App\Permissao::class);
    }

    public function users()
    {
    	return $this->belongsToMany(\App\User::class);
    }
	
}

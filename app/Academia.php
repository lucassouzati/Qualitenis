<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academia extends Model
{
	protected $fillable = ['nome','CNPJ','numQuadras'];
	public function cidade()
	{
		return $this->belongsTo('App\Cidade');
	}
	public function tenistas()
    {
    	return $this->hasMany('App\Tenista');
    }
  
	
}

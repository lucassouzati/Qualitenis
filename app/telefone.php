<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefone extends Model
{
	public function funcionario()
	{
		return $this->belongsTo('App\User');
	}
}

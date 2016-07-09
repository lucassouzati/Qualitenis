<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneio extends Model
{
    //
        protected $fillable = ["data, cidade_id, informacoes, precodainscricao, numerodechaveamentos, statustorneio_id, sexo"];

        public function cidade()
    {
    	return $this->belongsTo('App\Cidade');
    }
}

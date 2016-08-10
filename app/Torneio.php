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

    public function chaveamentos()
    {
        return $this->hasMany('App\Chaveamento');
    }

    public function inscricoes()
    {
    	return $this->hasMany('App\Inscricao');
    }

    public function statustorneio()
    {
        return $this->belongsTo('App\Statustorneio');
    }
}

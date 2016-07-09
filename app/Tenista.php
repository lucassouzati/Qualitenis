<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenista extends Model
{
    //
    protected $fillable = ["login", "email", "senha", "nome", "telefone", "cidade", "datadenascimento", "cpf", "statustenista"];
    public function cidade()
    {
    	return $this->belongsTo('App\Cidade');
    }

    public function statustenista()
    {
    	return $this->belongsTo('App\Statustenista');
    }

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenista extends Authenticatable
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

       

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];


}

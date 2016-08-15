<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissao;
use App\Papel;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','CPF', 'email', 'password','telefone', 
    ];

    public function telefones()
    {
        return $this->hasMany('App\telefone');
    }
    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }
    public function academia()
    {
        return $this->belongsTo('App\Academia');
    }

    public function papels()
    {
        return $this->belongsToMany(\App\Papel::class);
    }



    //niveis de acessos
    public function temPermissao(Permissao $permissao)
    {   
        return $this->temPapeis($permissao->papels);
    }

    public function temPapeis($papels)
    {
        
        if(is_array($papels) || is_object($papels)){
            //dd($this->papels());

          return !! $papels->intersect($this->papels)->count();

        }

        return $this->papels->contains('nome', $papels);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

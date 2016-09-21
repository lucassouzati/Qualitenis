<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['descricão','palavrasChave'];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}

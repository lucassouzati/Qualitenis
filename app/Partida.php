<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use \App\EnumTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partidas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['data', 'jogador1', 'jogador2', 'setjogador1', 'setjogador2', 'vencedor', 'status', 'nivel', 'chaveamento_id'];
}

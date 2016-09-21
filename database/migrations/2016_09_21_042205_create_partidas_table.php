<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->integer('jogador1_id');
            $table->integer('jogador2_id');
            $table->integer('setjogador1');
            $table->integer('setjogador2');
            $table->enum('vencedor', ['Jogador 1', 'Jogador 2', 'Empate', 'Nenhum']);
            $table->enum('status', ['Agendada', 'Em Execução', 'Concluída', 'Cancelada']);
            $table->integer('nivel');
            $table->integer('chaveamento_id')->unsigned();
            $table->foreign('chaveamento_id')->references('id')->on('chaveamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partidas');
    }
}

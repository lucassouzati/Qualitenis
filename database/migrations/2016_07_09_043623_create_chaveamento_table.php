<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaveamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chaveamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numerodejogadores');
            $table->integer('torneio_id')->unsigned();
            $table->foreign('torneio_id')->references('id')->on('torneios');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('id')->on('classes');
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
        Schema::drop('chaveamentos');
    }
}

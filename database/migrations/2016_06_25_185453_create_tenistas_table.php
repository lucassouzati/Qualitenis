<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('nome');
            $table->string('telefone');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->date('datadenascimento');
            $table->integer('cpf')->unique()->nullable();
            $table->integer('statustenista_id')->unsigned();
            $table->foreign('statustenista_id')->references('id')->on('statustenistas');
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
        Schema::drop('tenistas');
    }
}

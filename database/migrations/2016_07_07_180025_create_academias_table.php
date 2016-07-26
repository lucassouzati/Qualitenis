<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->string('CNPJ')->unique();
            $table->integer('numQuadras');
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
        Schema::drop('academias');
    }
}

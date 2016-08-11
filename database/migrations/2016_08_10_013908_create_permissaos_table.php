<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('permissaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->timestamps();
        });
         
          Schema::create('papel_permissao', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('permissao_id')->unsigned();
            $table->foreign('permissao_id')->references('id')->on('permissaos')->onDelete('cascade');

            $table->integer('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');
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
        Schema::drop('papel_permissao');
        Schema::drop('permissaos');   

    }
}

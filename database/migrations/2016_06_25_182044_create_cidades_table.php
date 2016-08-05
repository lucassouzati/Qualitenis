<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado_id')->unsigned();
            
            $table->string('uf');
            $table->string('nome');
            
        });

        Schema::table('cidades', function (Blueprint $table) {
            $table->foreign('estado_id')->references('id')->on('estados');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cidades');
    }
}

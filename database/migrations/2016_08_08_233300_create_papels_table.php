<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
             $table->string('descricao');            
            $table->timestamps();
        });

        Schema::create('papel_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
         Schema::drop('papels_users');
        Schema::drop('papels');
    }
}

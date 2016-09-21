
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->text('informacoes');
            $table->float('precodainscricao');
            $table->integer('numerodechaveamentos');
            $table->integer('statustorneio_id')->unsigned();
            $table->foreign('statustorneio_id')->references('id')->on('statustorneios');
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
        Schema::drop('torneios');
    }
}

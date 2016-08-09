<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenista_id')->unsigned();
            $table->foreign('tenista_id')->references('id')->on('tenistas');
            $table->integer('torneio_id')->unsigned();
            $table->foreign('torneio_id')->references('id')->on('torneios');
            $table->integer('chaveamento_id')->unsigned();
            $table->foreign('chaveamento_id')->references('id')->on('chaveamentos');
            $table->boolean('pago');
            $table->enum('status', ['Aguardando Pagamento', 'Confirmada', 'Cancelada']);
            $table->date('prazodepagamento');
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
        Schema::drop('inscricoes');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtributesToChaveamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chaveamentos', function (Blueprint $table) {
            $table->integer('minutosestimadosdepartida')->unsigned();
            $table->integer('qtdset')->unsigned();
            $table->integer('qtdgameporset')->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chaveamentos', function (Blueprint $table) {
            $table->dropColumn('minutosestimadosdepartida');
            $table->dropColumn('qtdset');
            $table->dropColumn('qtdgameporset');
        });
    }
}

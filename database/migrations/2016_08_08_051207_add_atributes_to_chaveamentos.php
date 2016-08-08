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
            $table->boolean('dupla');
            $table->integer('minutosestimadosdepartida');
            $table->integer('qtdset');
            $table->integer('qtdgameporset');
            
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
            $table->dropColumn('dupla');
            $table->dropColumn('minutosestimadosdepartida');
            $table->dropColumn('qtdset');
            $table->dropColumn('qtdgameporset');
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVagasChaveamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('chaveamentos', function (Blueprint $table) {
            $table->integer('vagas');
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
            $table->dropColumn('vagas');
        });
    }
}

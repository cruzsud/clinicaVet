<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoAnimalAlunoTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animais', function(Blueprint $table) {
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id_tipo')->on('tipo_animais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('animais', function(Blueprint $table){

                $table->dropColumn('id_cliente');
                $table->dropColumn('id_tipo');

         });
    }
}

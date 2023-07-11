<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaEntradaVisitante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_visitante', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora_entrada');
            $table->time('hora_saida')->nullable();
            $table->string('destino');
            $table->string('falar');
            $table->timestamps();
            $table->unsignedBigInteger('visitante_id');
            $table->foreign('visitante_id')->references('id')->on('visitantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaSaidaMilitar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saida_militar', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora_saida');
            $table->time('hora_retorno')->nullable();
            $table->string('destino');
            $table->timestamps();
            $table->unsignedBigInteger('militars_id');
            $table->foreign('militars_id')->references('id')->on('militars');
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

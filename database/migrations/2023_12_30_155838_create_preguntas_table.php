<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('textopregunta');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('escala_id');
            $table->unsignedBigInteger('informe_id');
            
            $table->timestamps();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('escala_id')->references('id')->on('escalas');
            $table->foreign('informe_id')->references('id')->on('informes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}

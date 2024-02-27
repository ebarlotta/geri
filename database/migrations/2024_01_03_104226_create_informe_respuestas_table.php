<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_respuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agente_informes_id');
            $table->unsignedBigInteger('preguntas_id');
            $table->double('cantidad');
            $table->string('descripcion');
            $table->text('fotourl')->default(null)->nullable();

            $table->timestamps();

            $table->foreign('agente_informes_id')->references('id')->on('agente_informes');
            $table->foreign('preguntas_id')->references('id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_respuestas');
    }
}

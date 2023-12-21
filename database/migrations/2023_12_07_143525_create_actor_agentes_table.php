<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_agentes', function (Blueprint $table) {
            $table->id();
            $table->date('fingreso');
            $table->date('fegreso');
            $table->string('alias');
            $table->double('peso_id');
            $table->unsignedBigInteger('actor_referente');
            $table->unsignedBigInteger('cama_id');
            $table->unsignedBigInteger('datossociales_id');  //hacer
            $table->unsignedBigInteger('datosmedicos_id');   //hacer
            $table->unsignedBigInteger('motivos_egreso_id');
            $table->unsignedBigInteger('grado_dependencia_id');
            $table->unsignedBigInteger('historiadevida_id'); //hacer
            $table->unsignedBigInteger('informes_id');       //hacer

            $table->timestamps();

            $table->foreign('actor_referente')->references('id')->on('actor_referentes');
            $table->foreign('cama_id')->references('id')->on('camas')->default(0);
            $table->foreign('datossociales_id')->references('id')->on('datos_socials');
            $table->foreign('datosmedicos_id')->references('id')->on('datos_medicos');
            $table->foreign('motivos_egreso_id')->references('id')->on('motivos_egresos');
            $table->foreign('grado_dependencia_id')->references('id')->on('grado_dependencias');
            $table->foreign('historiadevida_id')->references('id')->on('historia_vidas');
            $table->foreign('informes_id')->references('id')->on('informes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_agentes');
    }
}

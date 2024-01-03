<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenteInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente_informes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agente_id');
            $table->integer('nroperiodo')->default(1);
            $table->string('anio');
            $table->unsignedBigInteger('profesional_id');
            $table->unsignedBigInteger('empresa_id');

            $table->timestamps();

            $table->foreign('agente_id')->references('id')->on('actor_agentes');
            $table->foreign('profesional_id')->references('id')->on('actor_personals');
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agente_informes');
    }
}

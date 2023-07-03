<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('documentotipo_id');
            $table->bigInteger('documentonro');
            $table->date('nacimiento');
            $table->string('direccion');
            $table->unsignedBigInteger('estadocivil_id');
            $table->unsignedBigInteger('sexo_id');
            $table->string('email');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->unsignedBigInteger('localidad_id');
            $table->unsignedBigInteger('obrasocial_id');
            $table->unsignedBigInteger('escolaridad_id');
            $table->string('telefono');
            $table->string('avatar');
            $table->unsignedBigInteger('empresa_id');
            $table->boolean('activo');

            $table->timestamps();

            $table->foreign('documentotipo_id')->references('id')->on('tipos_documentos');
            $table->foreign('estadocivil_id')->references('id')->on('estados_civiles');
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->foreign('escolaridad_id')->references('id')->on('escolaridades');
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
        Schema::dropIfExists('actors');
    }
}

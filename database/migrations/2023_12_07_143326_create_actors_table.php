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
            $table->unsignedBigInteger('tipos_documento');
            $table->integer('documento');
            $table->date('nacimiento');
            $table->string('domicilio');
            $table->unsignedBigInteger('sexo_id');
            $table->string('email');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->unsignedBigInteger('localidad_id');
            $table->unsignedBigInteger('obrasocial_id');
            $table->unsignedBigInteger('escolaridad_id');
            $table->unsignedBigInteger('telefono');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('tipopersona_id');
            $table->string('urlfoto');
            $table->boolean('activo');

            $table->timestamps();

            $table->foreign('tipos_documento')->references('id')->on('tipos_documentos');
            $table->foreign('sexo_id')->references('id')->on('sexos');      
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->foreign('obrasocial_id')->references('id')->on('beneficios'); 
            $table->foreign('escolaridad_id')->references('id')->on('escolaridades');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('tipopersona_id')->references('id')->on('tipo_de_personas');
            
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

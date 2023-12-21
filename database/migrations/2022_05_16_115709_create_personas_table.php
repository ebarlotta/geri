<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('name')->require();
            $table->string('email')->nullable();
            $table->date('email_verified_at')->nullable();
            $table->date('nacimiento');
            $table->string('alias')->nullable();
            $table->integer('documento');
            $table->string('domicilio');
            $table->unsignedBigInteger('sexo_id');
            $table->text('url')->nullable();
            $table->unsignedBigInteger('cama_id');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->unsignedBigInteger('localidad_id');
            $table->unsignedBigInteger('escolaridad_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('beneficio_id');
            $table->unsignedBigInteger('tipopersona_id');
            $table->unsignedBigInteger('gradodependencia_id');
            $table->unsignedBigInteger('estadocivil_id');
            $table->unsignedBigInteger('tipodocumento_id');

            $table->timestamps();

            //$table->foreignIdFor(PersonActivo::class,'id');
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->foreign('estado_id')->references('id')->on('person_activos');
            $table->foreign('beneficio_id')->references('id')->on('beneficios');
            $table->foreign('tipodocumento_id')->references('id')->on('tipos_documentos');
            $table->foreign('estadocivil_id')->references('id')->on('estados_civiles');
            $table->foreign('tipopersona_id')->references('id')->on('tipo_de_personas');
            $table->foreign('gradodependencia_id')->references('id')->on('grado_dependencias');
            $table->foreign('escolaridad_id')->references('id')->on('escolaridades');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->foreign('cama_id')->references('id')->on('camas')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}

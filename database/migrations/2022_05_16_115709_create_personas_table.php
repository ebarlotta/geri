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
            $table->string('alias');
            $table->integer('documento');
            $table->string('domicilio');
            $table->integer('sexo');
            $table->text('url')->nullable();
            $table->unsignedBigInteger('cama_id');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->unsignedBigInteger('localidad_id');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('beneficio_id');
            $table->unsignedBigInteger('tipodocumento_id');
            $table->unsignedBigInteger('estadocivil_id');
            $table->unsignedBigInteger('tipopersona_id');
            $table->unsignedBigInteger('gradodependencia_id');
            $table->unsignedBigInteger('escolaridad_id');

            $table->timestamps();

            //$table->foreignIdFor(PersonActivo::class,'id');
            $table->foreign('estado_id')->references('id')->on('person_activos')->onDelete('cascade');
            $table->foreign('beneficio_id')->references('id')->on('beneficios');
            $table->foreign('tipodocumento_id')->references('id')->on('tipos_documentos')->onDelete('cascade');
            $table->foreign('estadocivil_id')->references('id')->on('estados_civiles')->onDelete('cascade');
            $table->foreign('tipopersona_id')->references('id')->on('tipo_de_personas')->onDelete('cascade');
            $table->foreign('gradodependencia_id')->references('id')->on('grado_dependencias')->onDelete('cascade');
            $table->foreign('escolaridad_id')->references('id')->on('escolaridades')->onDelete('cascade');
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
        Schema::dropIfExists('people');
    }
}

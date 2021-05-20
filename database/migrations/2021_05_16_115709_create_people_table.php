<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();

            $table->string('name')->require();
            $table->string('email')->nullable();
            $table->date('email_verified_at');
            $table->date('nacimiento');
            $table->integer('idestado')->foreign('idestado')->references('id')->on('personactivo');
            $table->text('alias');
            $table->integer('idbeneficio')->foreign('idbeneficio')->references('id')->on('beneficio');
            $table->integer('documento');
            $table->integer('idtipodocumento')->foreign('idtipodocumento')->references('id')->on('tiposdocumentos');
            $table->text('domicilio');
            $table->text('localidad');
            $table->integer('sexo');
            $table->text('nacionalidad');
            $table->integer('idestadocivil')->foreign('idestadocivil')->references('id')->on('estadosciviles');
            $table->integer('idtipopersona')->foreign('idtipopersona')->references('id')->on('tiposdepersonas');

            $table->timestamps();
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

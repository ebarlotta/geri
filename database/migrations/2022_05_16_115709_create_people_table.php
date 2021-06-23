<?php

use App\Models\PersonActivo;
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
            $table->string('alias');
            $table->integer('documento');
            $table->string('domicilio');
            $table->string('localidad');
            $table->integer('sexo');
            $table->string('nacionalidad');
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('beneficio_id');
            $table->unsignedBigInteger('tipodocumento_id');
            $table->unsignedBigInteger('estadocivil_id');
            $table->unsignedBigInteger('tipopersona_id');

            $table->timestamps();

            //$table->foreignIdFor(PersonActivo::class,'id');
            $table->foreign('estado_id')->references('id')->on('person_activos')->onDelete('cascade');
            $table->foreign('beneficio_id')->references('id')->on('beneficios');
            $table->foreign('tipodocumento_id')->references('id')->on('tipos_documentos')->onDelete('cascade');
            $table->foreign('estadocivil_id')->references('id')->on('estados_civiles')->onDelete('cascade');
            $table->foreign('tipopersona_id')->references('id')->on('tipo_de_personas')->onDelete('cascade');

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

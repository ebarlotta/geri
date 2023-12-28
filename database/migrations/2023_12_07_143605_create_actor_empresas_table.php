<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iva_id');

            $table->string('actividad');
            $table->string('caracterdeltitular');
            // $table->unsignedBigInteger('titular_id');  //Hace referencia a Person')
            $table->unsignedBigInteger('actor_id');

            $table->foreign('actor_id')->references('id')->on('actors');
            $table->foreign('iva_id')->references('id')->on('ivas');
            // $table->foreign('titular_id')->references('id')->on('actors');

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
        Schema::dropIfExists('actor_empresas');
    }
}

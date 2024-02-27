<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorReferentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_referentes', function (Blueprint $table) {
            $table->id();

            $table->string('vinculo');
            $table->string('modalidad');
            $table->string('ultimaocupacion')->nullable();
            $table->boolean('viviendapropia')->default(0);
            $table->string('canthijosvarones')->default(0);
            $table->string('canthijasmujeres')->default(0);
            $table->unsignedBigInteger('actor_id');
            $table->boolean('activo')->default(true);

            $table->timestamps();

            $table->foreign('actor_id')->references('id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_referentes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {

            $table->id();
            $table->string('nombreinforme');
            $table->unsignedBigInteger('periodo_id');
            $table->unsignedBigInteger('area_id');
            $table->string('observaciones');
            $table->unsignedBigInteger('empresa_id');

            $table->timestamps();

            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->foreign('area_id')->references('id')->on('areas');            
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
        Schema::dropIfExists('informes');
    }
}

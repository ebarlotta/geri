<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('provincia_descripcion')->unique();
            $table->unsignedBigInteger('nacionalidads_id');
            $table->timestamps();

            $table->foreign('nacionalidads_id')->references('id')->on('nacionalidads');
            //$table->foreign('estado_id')->references('id')->on('person_activos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}

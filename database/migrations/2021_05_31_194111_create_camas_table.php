<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camas', function (Blueprint $table) {
            $table->id();
            $table->integer('NroHabitacion');
            $table->integer('NroCama');
            $table->integer('EstadoCama');  // 1 Habilitada  0 Desabilitada
            $table->integer('SexoCama');    // 1 masculino   0 Femenina
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
        Schema::dropIfExists('camas');
    }
}

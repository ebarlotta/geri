<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombremedicamento');
            $table->unsignedBigInteger('unidad_id');
            $table->double('cantidad')->default(0);
            $table->boolean('psiquiatrico')->default(false);

            $table->timestamps();

            $table->foreign('unidad_id')->references('id')->on('unidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
}

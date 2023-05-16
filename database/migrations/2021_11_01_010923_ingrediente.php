<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingrediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreingrediente',30);
            $table->unsignedBigInteger('unidad_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('unidad_id')->references('id')->on('unidads');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('empresa_id')->references('id')->on('empresas');

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
        //
    }
}

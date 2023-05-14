<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuloUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_usuarios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('modulo_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modificado_user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('modulo_id')->references('id')->on('modulos');
            $table->foreign('modificado_user_id')->references('id')->on('users');

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
        Schema::dropIfExists('modulo_usuarios');
    }
}

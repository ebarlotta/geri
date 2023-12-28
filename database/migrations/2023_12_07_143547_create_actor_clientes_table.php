<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iva_id');
            $table->unsignedBigInteger('actor_id');

            $table->foreign('iva_id')->references('id')->on('ivas');
            $table->foreign('actor_id')->references('id')->on('actors');

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
        Schema::dropIfExists('actor_clientes');
    }
}

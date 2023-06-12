<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuingredienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuingredientes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->double('cantidad')->default(0);
            

            $table->timestamps();

            //$table->foreignIdFor(PersonActivo::class,'id');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuingrediente');
    }
}

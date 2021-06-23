<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelInterfacesCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_interfaces_campos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interface_id');
            $table->unsignedBigInteger('campo_id');
            $table->timestamps();

            $table->foreign('interface_id')->references('id')->on('interfaces')->onDelete('cascade');
            $table->foreign('campo_id')->references('id')->on('personas_campos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_interfaces_campos');
    }
}

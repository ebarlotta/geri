<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_campos', function (Blueprint $table) {
            $table->id();
            $table->text('NombreCampo');
            $table->text('TipoCampo');
            $table->integer('OrdenCampo');
            $table->integer('TipoPersona_id');
            $table->text('LabelCampo');
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
        Schema::dropIfExists('personas_campos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_medicos', function (Blueprint $table) {
            $table->id();
            $table->double('descartables');
            $table->string('grupo');
            $table->string('sanatorio');
            $table->string('farmacia');
            $table->string('laboratorio');
            $table->string('instradio');
            $table->string('urlfotodni');
            $table->string('urlfotocarnet');
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
        Schema::dropIfExists('datos_medicos');
    }
}

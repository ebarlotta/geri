<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_personals', function (Blueprint $table) {
            $table->id();

            $table->string('modalidad');
            $table->date('fingreso');
            $table->double('iminimo');
            $table->string('cbu',22)->nullable();
            $table->string('nrotramite')->nullable();
            $table->string('patente')->nullable();
            $table->string('nrocta')->nullable();
            $table->boolean('activo')->default(true);
            $table->unsignedBigInteger('actor_id');
            
            $table->timestamps();
        
            $table->foreign('actor_id')->references('id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_personals');
    }
}

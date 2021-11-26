<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('inicio');
            $table->date('fin');
            $table->integer('gradoAvance');
            $table->unsignedBigInteger('idProyecto')->nullable();
            $table->foreign('idProyecto')->references('id')->on('proyecto')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea');
    }
}

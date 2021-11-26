<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTarearecurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarearecurso', function (Blueprint $table) {
            $table->id();
            $table->double('costo', 8, 2);
            $table->unsignedBigInteger('idTarea')->nullable();
            $table->foreign('idTarea')->references('id')->on('tarea')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('idRecurso')->nullable();
            $table->foreign('idRecurso')->references('id')->on('recurso')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarearecurso');
    }
}

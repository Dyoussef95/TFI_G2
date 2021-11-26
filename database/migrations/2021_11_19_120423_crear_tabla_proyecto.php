<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('inicio');
            $table->date('fin');
            $table->unsignedBigInteger('idUsuario')->nullable();
            $table->foreign('idUsuario')->references('id')->on('usuario')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('idEncargado')->nullable();
            $table->foreign('idEncargado')->references('id')->on('encargado')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}

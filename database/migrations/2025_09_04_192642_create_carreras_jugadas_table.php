<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carreras_jugadas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->bigInteger('banquero_id')->unsigned()->nullable();
            $table->bigInteger('taquilla_id')->unsigned()->nullable();
            $table->bigInteger('carrera_id')->unsigned()->nullable();
            $table->integer('carrera')->unsigned()->nullable();
            $table->bigInteger('hipodromo_id')->unsigned()->nullable();
            $table->bigInteger('origen_id')->unsigned()->nullable();
            $table->string('apuesta', 8)->nullable();
            $table->integer('numero_ejemplar')->nullable();
            $table->integer('numero_ejemplar_place')->nullable();
            $table->integer('numero_ejemplar_show')->nullable();
            $table->integer('numero_ejemplar_exacta1')->nullable();
            $table->integer('numero_ejemplar_exacta2')->nullable();
            $table->integer('numero_ejemplar_trifecta1')->nullable();
            $table->integer('numero_ejemplar_trifecta2')->nullable();
            $table->integer('numero_ejemplar_trifecta3')->nullable();
            $table->integer('numero_ejemplar_superfecta1')->nullable();
            $table->integer('numero_ejemplar_superfecta2')->nullable();
            $table->integer('numero_ejemplar_superfecta3')->nullable();
            $table->integer('numero_ejemplar_superfecta4')->nullable();
            $table->double('monto_apuesta', 10,2)->nullable();
            $table->double('apuesta_ganador', 10,2)->nullable();
            $table->double('apuesta_place', 10,2)->nullable();
            $table->double('apuesta_show', 10,2)->nullable();
            $table->double('apuesta_exacta', 10,2)->nullable();
            $table->double('apuesta_trifecta', 10,2)->nullable();
            $table->double('apuesta_superfecta', 10,2)->nullable();
            $table->integer('caballo_ganador')->nullable();
            $table->integer('caballo_segundo')->nullable();
            $table->integer('caballo_tercero')->nullable();
            $table->integer('caballo_cuarto')->nullable();
            $table->double('dividendo_ganador', 10,2)->nullable();
            $table->double('dividendo_ganador_place', 10,2)->nullable();
            $table->double('dividendo_ganador_show', 10,2)->nullable();
            $table->double('dividendo_segundo_place', 10,2)->nullable();
            $table->double('dividendo_segundo_show', 10,2)->nullable();
            $table->double('dividendo_tercero_show', 10,2)->nullable();
            $table->double('dividendo_exacta', 10,2)->nullable();
            $table->double('dividendo_trifecta', 10,2)->nullable();
            $table->double('dividendo_superfecta', 10,2)->nullable();
            $table->double('perdio_ganador', 10,2)->nullable();
            $table->double('perdio_place', 10,2)->nullable();
            $table->double('perdio_show', 10,2)->nullable();
            $table->double('perdio_exacta', 10,2)->nullable();
            $table->double('perdio_trifecta', 10,2)->nullable();
            $table->double('perdio_superfecta', 10,2)->nullable();
            $table->double('total_ganado', 10,2)->nullable();
            $table->double('total_perdido', 10,2)->nullable();
            $table->integer('ticket')->nullable();
            $table->integer('cod_seguridad')->nullable();
            $table->bigInteger('moneda_id')->unsigned()->nullable();
            $table->string('fecha_jugada', 10)->nullable();
            $table->string('hora_apuesta', 10)->nullable();
            $table->string('hora_anulado', 10)->nullable();
            $table->bigInteger('estatus_id')->unsigned()->nullable();
            $table->Integer('online_pagado')->nullable()->default(0);
            $table->integer('fecha_invertida')->nullable();

            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('banquero_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('taquilla_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('hipodromo_id')->references('id')->on('hipodromos')->onDelete('cascade');
            $table->foreign('origen_id')->references('id')->on('origenes')->onDelete('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus_tickets')->onDelete('cascade');
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras_jugadas');
    }
};

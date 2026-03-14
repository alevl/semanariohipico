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
        Schema::create('carreras', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->integer('numero_carrera')->nullable();
            $table->bigInteger('hipodromo_id')->unsigned()->nullable();
            $table->string('fecha_carrera', 10)->nullable();
            $table->string('hora_cierre', 10)->nullable();
            $table->bigInteger('apuesta_id')->unsigned()->nullable();
            $table->integer('caballo_ganador')->nullable();
            $table->integer('caballo_segundo')->nullable();
            $table->integer('caballo_tercero')->nullable();
            $table->integer('caballo_cuarto')->nullable();
            $table->double('dividendo_ganador', 10,2)->nullable();
            $table->double('dividendo_ganador_place', 10,2)->nullable()->default(0);
            $table->double('dividendo_ganador_show', 10,2)->nullable()->default(0);
            $table->double('dividendo_segundo_place', 10,2)->nullable()->default(0);
            $table->double('dividendo_segundo_show', 10,2)->nullable()->default(0);
            $table->double('dividendo_tercero_show', 10,2)->nullable()->default(0);
            $table->double('dividendo_exacta', 10,2)->nullable()->default(0);
            $table->double('dividendo_trifecta', 10,2)->nullable()->default(0);
            $table->double('dividendo_superfecta', 10,2)->nullable()->default(0);
            $table->double('total_jugado', 10,2)->nullable();
            $table->double('total_pagado', 10,2)->nullable();
            $table->bigInteger('estatus_id')->unsigned()->nullable();

            $table->foreign('hipodromo_id')->references('id')->on('hipodromos')->onDelete('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus_carreras')->onDelete('cascade');
            $table->foreign('apuesta_id')->references('id')->on('tipo_apuestas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};

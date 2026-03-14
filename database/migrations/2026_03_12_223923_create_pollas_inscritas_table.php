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
        Schema::create('pollas_inscritas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('polla_id')->unsigned()->nullable();
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->Integer('carrera1')->nullable();
            $table->Integer('carrera2')->nullable();
            $table->Integer('carrera3')->nullable();
            $table->Integer('carrera4')->nullable();
            $table->Integer('carrera5')->nullable();
            $table->Integer('carrera6')->nullable();
            $table->string('fecha_inscrita', 20)->nullable();
            $table->Integer('puntos_carrera1')->nullable()->default('0');
            $table->Integer('puntos_carrera2')->nullable()->default('0');
            $table->Integer('puntos_carrera3')->nullable()->default('0');
            $table->Integer('puntos_carrera4')->nullable()->default('0');
            $table->Integer('puntos_carrera5')->nullable()->default('0');
            $table->Integer('puntos_carrera6')->nullable()->default('0');
            $table->Integer('puntos_total')->nullable()->default('0');
            $table->bigInteger('estatus_id')->unsigned()->nullable();

            $table->foreign('polla_id')->references('id')->on('pollas')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus_pollas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pollas_inscritas');
    }
};

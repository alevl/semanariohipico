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
        Schema::create('pronosticos', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('fecha_carrera', 10);
            $table->string('fecha_invertida', 8);
            $table->bigInteger('hipodromo_id')->unsigned()->nullable();
            $table->integer('carrera')->nullable();
            $table->string('primera_marca', 30)->nullable();
            $table->string('segunda_marca', 30)->nullable();
            $table->string('tercera_marca', 30)->nullable();
            $table->string('cuarta_marca', 30)->nullable();

            $table->timestamps();

            $table->foreign('hipodromo_id')->references('id')->on('hipodromos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pronosticos');
    }
};

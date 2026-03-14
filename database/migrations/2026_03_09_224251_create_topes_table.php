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
        Schema::create('topes', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('banquero_id')->unsigned()->nullable();
            $table->bigInteger('taquilla_id')->unsigned()->nullable();
            $table->bigInteger('moneda_id')->unsigned()->nullable();
            $table->double('cupo_caballo', 10,2)->nullable();
            $table->double('apuesta_minima', 10,2)->nullable();
            $table->double('apuesta_maxima', 10,2)->nullable();
            $table->double('maximo_dividendo', 10,2)->nullable();

            $table->foreign('banquero_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('taquilla_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topes');
    }
};

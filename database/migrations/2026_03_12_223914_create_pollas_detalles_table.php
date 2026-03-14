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
        Schema::create('pollas_detalles', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('polla_id')->unsigned()->nullable();
            $table->Integer('carrera')->nullable();
            $table->Integer('carrera_orden')->nullable();
            $table->Integer('numero_ejemplar')->nullable();

            $table->foreign('polla_id')->references('id')->on('pollas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pollas_detalles');
    }
};

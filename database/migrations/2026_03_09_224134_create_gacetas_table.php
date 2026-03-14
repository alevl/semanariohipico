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
        Schema::create('gacetas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('fecha', 10)->nullable();
            $table->bigInteger('hipodromo_id')->unsigned()->nullable();
            $table->string('ruta', 2048)->nullable();
            $table->string('fecha_invertida', 8)->nullable();

            $table->foreign('hipodromo_id')->references('id')->on('hipodromos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gacetas');
    }
};

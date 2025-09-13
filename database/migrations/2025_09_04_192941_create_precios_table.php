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
        Schema::create('precios', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('moneda_id')->unsigned()->nullable();
            $table->double('ganador', 10,2)->nullable();
            $table->double('place', 10,2)->nullable();
            $table->double('show', 10,2)->nullable();
            $table->double('exacta', 10,2)->nullable();
            $table->double('trifecta', 10,2)->nullable();
            $table->double('superfecta', 10,2)->nullable();

            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precios');
    }
};

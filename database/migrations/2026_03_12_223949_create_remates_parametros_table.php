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
        Schema::create('remates_parametros', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('moneda_id')->unsigned()->nullable();
            $table->double('caso1_i', 10,2)->nullable();
            $table->double('caso1_f', 10,2)->nullable();
            $table->double('caso1_m', 10,2)->nullable();
            $table->double('caso2_i', 10,2)->nullable();
            $table->double('caso2_f', 10,2)->nullable();
            $table->double('caso2_m', 10,2)->nullable();
            $table->double('caso3_i', 10,2)->nullable();
            $table->double('caso3_f', 10,2)->nullable();
            $table->double('caso3_m', 10,2)->nullable();
            $table->double('caso4_i', 10,2)->nullable();
            $table->double('caso4_f', 10,2)->nullable();
            $table->double('caso4_m', 10,2)->nullable();

            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remates_parametros');
    }
};

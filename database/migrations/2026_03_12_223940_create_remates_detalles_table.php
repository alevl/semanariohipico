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
        Schema::create('remates_detalles', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('remate_id')->unsigned()->nullable();
            $table->Integer('carrera')->nullable();
            $table->Integer('numero_ejemplar')->nullable();
            $table->string('ejemplar', 20)->nullable();
            $table->bigInteger('caballo_id')->unsigned()->nullable();
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->double('monto', 10,2)->nullable();
            $table->double('puja_anterior', 10,2)->nullable();
 
            $table->foreign('remate_id')->references('id')->on('remates')->onDelete('cascade');
            $table->foreign('caballo_id')->references('id')->on('caballos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remates_detalles');
    }
};

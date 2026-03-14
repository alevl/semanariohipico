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
        Schema::create('user_movimientos', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->string('fecha', 10)->nullable();
            $table->integer('fecha_invertida')->nullable();
            $table->integer('referencia')->nullable();
            $table->bigInteger('operacion_id')->unsigned()->nullable();
            $table->double('monto', 10,2)->nullable();
            $table->string('descripcion', 50)->nullable();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('operacion_id')->references('id')->on('operaciones')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_movimientos');
    }
};

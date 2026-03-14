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
        Schema::create('remates', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->string('fecha', 20)->nullable();
            $table->string('hora_cierre', 20)->nullable();
            $table->bigInteger('hipodromo_id')->unsigned()->nullable();
            $table->bigInteger('estatus_id')->unsigned()->nullable();
            $table->double('monto_pagar', 10,2)->nullable();
            $table->double('comision', 10,2)->nullable();
            $table->double('incentivo', 10,2)->nullable();
            $table->Integer('carrera')->nullable();
            $table->string('observacion', 255)->nullable();
            $table->timestamp('cierre_carrera')->nullable();

            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hipodromo_id')->references('id')->on('hipodromos')->onDelete('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus_remates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remates');
    }
};

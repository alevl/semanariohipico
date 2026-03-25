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
        Schema::create('pollas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->string('fecha', 20)->nullable();
            $table->string('hora_cierre', 20)->nullable();
            $table->bigInteger('hipodromo_id')->unsigned()->nullable();
            $table->bigInteger('estatus_id')->unsigned()->nullable();
            $table->Integer('monto_pagar')->nullable();
            $table->Integer('inscripcion')->nullable();
            $table->Integer('inscritos')->nullable();
            $table->Integer('comision')->nullable();
            $table->Integer('incentivo')->nullable();
            $table->Integer('carreras_programadas')->nullable();
            $table->string('observacion', 255)->nullable();

            $table->Integer('primera_uno')->nullable();
            $table->Integer('primera_dos')->nullable();
            $table->Integer('primera_tres')->nullable();

            $table->Integer('segunda_uno')->nullable();
            $table->Integer('segunda_dos')->nullable();
            $table->Integer('segunda_tres')->nullable();

            $table->Integer('tercera_uno')->nullable();
            $table->Integer('tercera_dos')->nullable();
            $table->Integer('tercera_tres')->nullable();

            $table->Integer('cuarta_uno')->nullable();
            $table->Integer('cuarta_dos')->nullable();
            $table->Integer('cuarta_tres')->nullable();

            $table->Integer('quinta_uno')->nullable();
            $table->Integer('quinta_dos')->nullable();
            $table->Integer('quinta_tres')->nullable();

            $table->Integer('sexta_uno')->nullable();
            $table->Integer('sexta_dos')->nullable();
            $table->Integer('sexta_tres')->nullable();

            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hipodromo_id')->references('id')->on('hipodromos')->onDelete('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus_pollas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pollas');
    }
};

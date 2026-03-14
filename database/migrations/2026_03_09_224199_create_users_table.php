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
        Schema::create('users', function (Blueprint $table) {
           $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('username', 15)->unique();
            $table->string('name', 20)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->bigInteger('trato_id')->unsigned()->nullable();
            $table->bigInteger('nivel_id')->unsigned()->nullable();
            $table->double('monedero', 10,2)->nullable()->default('0.00');
            $table->bigInteger('moneda_id')->unsigned()->nullable();
            $table->string('cod_pais', 5)->nullable();
            $table->integer('caballos_minimo')->nullable()->default(5);
            $table->bigInteger('estatus_id')->unsigned()->nullable();
            $table->string('password', 255);
            $table->timestamps();

            $table->foreign('estatus_id')->references('id')->on('estatus_usuarios')->onDelete('cascade');
            $table->foreign('nivel_id')->references('id')->on('niveles')->onDelete('cascade');
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');
            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('trato_id')->references('id')->on('tratos')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

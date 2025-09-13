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
        Schema::create('regalias_nacionales', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('banquero_id')->unsigned()->nullable();
            $table->bigInteger('taquilla_id')->unsigned()->nullable();
            $table->double('i_caso1', 10,2)->nullable();
            $table->double('f_caso1', 10,2)->nullable();
            $table->string('modo1', 5)->nullable();
            $table->double('regalia1', 10,2)->nullable();
            $table->double('i_caso2', 10,2)->nullable();
            $table->double('f_caso2', 10,2)->nullable();
            $table->string('modo2', 5)->nullable();
            $table->double('regalia2', 10,2)->nullable();
            $table->double('i_caso3', 10,2)->nullable();
            $table->double('f_caso3', 10,2)->nullable();
            $table->string('modo3', 5)->nullable();
            $table->double('regalia3', 10,2)->nullable();
            $table->double('i_caso4', 10,2)->nullable();
            $table->double('f_caso4', 10,2)->nullable();
            $table->string('modo4', 5)->nullable();
            $table->double('regalia4', 10,2)->nullable();
            $table->double('i_caso5', 10,2)->nullable();
            $table->double('f_caso5', 10,2)->nullable();
            $table->string('modo5', 5)->nullable();
            $table->double('regalia5', 10,2)->nullable();

            $table->foreign('banquero_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('taquilla_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regalias_nacionales');
    }
};

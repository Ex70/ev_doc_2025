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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('correo');
            $table->string('nombre');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('id_semestre');
            $table->unsignedBigInteger('id_licenciatura');
            $table->unsignedBigInteger('id_programa');
            $table->foreign('id_semestre')->references('id')->on('semestres');
            $table->foreign('id_licenciatura')->references('id')->on('licenciaturas');
            $table->foreign('id_programa')->references('id')->on('programas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};

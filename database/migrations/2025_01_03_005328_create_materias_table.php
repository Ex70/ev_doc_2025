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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->unsignedBigInteger("id_semestre");
            $table->unsignedBigInteger("id_programa");
            $table->unsignedBigInteger("id_licenciatura");
            $table->unsignedBigInteger("id_docente");
            $table->timestamps();
            $table->foreign('id_semestre')->references('id')->on('semestres');
            $table->foreign('id_programa')->references('id')->on('programas');
            $table->foreign('id_licenciatura')->references('id')->on('licenciaturas');
            $table->foreign('id_docente')->references('id')->on('docentes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};

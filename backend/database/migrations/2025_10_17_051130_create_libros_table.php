<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('titulo'); // Título del libro
            $table->string('autor'); // Autor del libro
            $table->string('genero'); // Género literario
            $table->boolean('disponibilidad')->default(true); // true = disponible
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Revierte la migración (rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};

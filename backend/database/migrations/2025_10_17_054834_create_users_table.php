<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo_electronico')->unique();
            $table->string('password');
            $table->string('cedula', 10)->nullable()->unique();
            $table->string('pasaporte', 6)->nullable()->unique();
            $table->string('telefono', 10)->unique();
            $table->string('direccion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_habilitacion')->unique();
            $table->string('nombre_institucion', 200);
            $table->string('estado', 30)->default('Activo');
            $table->timestamps();
        });

        Schema::create('instituciones_covid', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_habilitacion')->unique();
            $table->string('nombre_institucion', 200);
            $table->string('estado', 30)->default('Activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instituciones');
        Schema::dropIfExists('instituciones_covid');
    }
};

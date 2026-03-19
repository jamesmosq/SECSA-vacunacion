<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->string('lote', 30)->primary();
            $table->string('insumo', 200);
            $table->string('presentacion', 200);
            $table->date('fecha_vencimiento')->nullable();
            $table->string('laboratorio', 200)->nullable();
            $table->integer('saldo')->default(0);
            $table->string('estado', 30)->default('Activo');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });

        Schema::create('lotes_covid', function (Blueprint $table) {
            $table->string('lote', 30)->primary();
            $table->string('insumo', 200);
            $table->string('presentacion', 200);
            $table->date('fecha_vencimiento')->nullable();
            $table->string('laboratorio', 200)->nullable();
            $table->integer('saldo')->default(0);
            $table->string('estado', 30)->default('Activo');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes');
        Schema::dropIfExists('lotes_covid');
    }
};

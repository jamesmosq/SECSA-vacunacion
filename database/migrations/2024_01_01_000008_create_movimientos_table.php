<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('institucion', 200);
            $table->date('fecha_movimiento');
            $table->integer('nro_pedido')->default(0);
            $table->string('lote', 30);
            $table->integer('ingreso')->default(0);
            $table->integer('salida')->default(0);
            $table->text('observaciones')->nullable();
            $table->string('tipo_identificacion', 30)->nullable();
            $table->string('identificacion', 30)->nullable();
            $table->string('nombres_apellidos', 200)->nullable();
            $table->timestamps();
        });

        Schema::create('movimientos_covid', function (Blueprint $table) {
            $table->id();
            $table->string('institucion', 200);
            $table->date('fecha_movimiento');
            $table->integer('nro_pedido')->default(0);
            $table->string('lote', 30);
            $table->integer('ingreso')->default(0);
            $table->integer('salida')->default(0);
            $table->text('observaciones')->nullable();
            $table->string('tipo_identificacion', 30)->nullable();
            $table->string('identificacion', 30)->nullable();
            $table->string('nombres_apellidos', 200)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos');
        Schema::dropIfExists('movimientos_covid');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_pedido')->unique();
            $table->string('radicado_paiweb', 100)->default('');
            $table->string('tipo_pedido', 30)->default('');
            $table->text('observaciones')->default('');
            $table->string('temperatura', 10)->default('');
            $table->timestamps();
        });

        Schema::create('pedidos_covid', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_pedido')->unique();
            $table->string('radicado_paiweb', 100)->default('');
            $table->string('tipo_pedido', 30)->default('');
            $table->text('observaciones')->default('');
            $table->string('temperatura', 10)->default('');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_covid');
    }
};

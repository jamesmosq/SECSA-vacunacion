<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario_opciones', function (Blueprint $table) {
            $table->id();
            $table->string('login', 100);
            $table->string('opcion', 200);
            $table->string('pagina', 200);
            $table->integer('orden');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario_opciones');
    }
};

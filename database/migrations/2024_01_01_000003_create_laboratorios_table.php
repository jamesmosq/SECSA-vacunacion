<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->timestamps();
        });

        Schema::create('laboratorios_covid', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratorios');
        Schema::dropIfExists('laboratorios_covid');
    }
};

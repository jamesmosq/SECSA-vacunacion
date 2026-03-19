<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carnets', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('tipo_id', 50);
            $table->string('numero_id', 50);
            $table->string('expedicion_id', 150);
            $table->string('nombres', 200);
            $table->string('persona_expide', 200);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carnets');
    }
};

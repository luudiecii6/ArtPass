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
        Schema::create('entradas', function (Blueprint $table) {
             $table->id();
             $table->string('nombre_evento');
             $table->date('fecha_evento');
             $table->string('direccion_evento');
             $table->time('horario_evento');
             $table->string('nombre_usuario');
             $table->string('apellidos_usuario');
             $table->string('codigo_qr', 5000)->unique();
             $table->foreignId('instancia_id')->constrained('instancias')->onDelete('cascade');
             $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};

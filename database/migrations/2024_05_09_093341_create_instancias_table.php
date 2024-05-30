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
        Schema::create('instancias', function (Blueprint $table) {
           $table->id();
           $table->time('horario');
           $table->date('fecha');
           $table->string('nombre_sala');
           $table->string('ciudad');
           $table->string('calle')->nullable();
           $table->string('comunidad')->nullable();
           $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instancias');
    }
};

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
        Schema::create('opiniones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->references('id')->on('productos');
            $table->foreignId('id_usuario')->references('id')->on('usuarios');
            $table->integer('calificacion')->nullable()->default(0); 
            $table->text('comentario');
            $table->dateTime('fecha_opinion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opiniones');
    }
};

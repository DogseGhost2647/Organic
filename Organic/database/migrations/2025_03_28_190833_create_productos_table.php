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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('precio');
            $table->integer('cantidad_disponible');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->foreignId('id_condicion')->constrained('condicion_cabellos');
            $table->enum('estado', ['disponible','agotado']);
            $table->foreignId('id_tipo')->references('id')->on('tipo_cabellos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

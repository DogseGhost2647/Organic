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
        Schema::create('envios', function (Blueprint $table): void {
            $table->id('id_envio'); // Clave primaria
            $table->integer('id_pedido')->unsigned(); // Clave foránea 
            $table->text('direccion_envio');
            $table->dateTime('fecha_envio')->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->timestamps();

            // Definir la clave foránea correctamente
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};

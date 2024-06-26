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
        Schema::create('venta_propuestas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('Estado', ['Aceptada', 'Pendiente', 'Rechazada']);
            $table->longText('Detalles');
            $table->foreignId('cliente_id')->default(1)->references('id')->on('clientes')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_propuestas');
    }
};

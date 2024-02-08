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
        Schema::create('venta_propuesta_productos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('VentaPropuestasId')
            ->  references('id')
            -> on ('venta_propuestas')
            -> onDelete('cascade');
            $table->foreignId('ProductosServiciosId')
            ->  references('id')
            -> on ('productes')
            -> onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_propuesta_productos');
    }
};

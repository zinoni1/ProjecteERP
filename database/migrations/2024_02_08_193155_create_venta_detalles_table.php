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
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('VentaPropuestaID')->nullable()->references('id')->on('venta_propuestas')->onDelete('cascade');
            $table->foreignId('ProductoServicioID')->default(1)->references('id')->on('productes')->onDelete('cascade');
            $table->integer('CantidadVendida');
            $table->decimal('PrecioUnitario', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_detalles');
    }
};

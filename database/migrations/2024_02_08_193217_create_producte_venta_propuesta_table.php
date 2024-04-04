<?php
//u
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
        Schema::create('producte_venta_propuesta', function (Blueprint $table) {
            $table->id();


            // Agrega la columna producte_id
            $table->foreignId('producte_id')
                ->references('id')
                ->on('productes')
                ->onDelete('cascade');

            $table->foreignId('venta_propuesta_id')
                ->references('id')
                ->on('venta_propuestas')
                ->onDelete('cascade');

            $table->integer('CantidadVendida')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producte_venta_propuesta');
    }
};

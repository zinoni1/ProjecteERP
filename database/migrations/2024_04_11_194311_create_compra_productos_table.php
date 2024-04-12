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
        Schema::create('compra_producte', function (Blueprint $table) {
            $table->id();


            // Agrega la columna producte_id
            $table->foreignId('producte_id')
                ->references('id')
                ->on('productes')
                ->onDelete('cascade');

            $table->foreignId('compra_id')
                ->references('id')
                ->on('compras')
                ->onDelete('cascade');

            $table->integer('Cantidad')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_producte');
    }
};

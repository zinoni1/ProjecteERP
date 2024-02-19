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
        Schema::create('productes', function (Blueprint $table) {
            $table->id('producte_id');
            $table->timestamps();
            $table->string('nombre');
            $table->mediumText('Descripcion');
            $table->decimal('Precio', 8, 2);
            $table->integer('Stock');
            $table->date('FechaEntrada');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productes');
    }
};

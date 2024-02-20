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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->foreignId('TipoClienteID')
            ->nullable() // Puedes agregar esta línea si permites que sea nulo
            ->default(null) // O esta línea si prefieres un valor predeterminado
            ->references('id')
            ->on('tipo_clientes')
            ->onDelete('cascade');
        
      

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

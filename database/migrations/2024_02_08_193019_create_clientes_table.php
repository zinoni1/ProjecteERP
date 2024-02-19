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
            $table->id('cliente_id');
            $table->timestamps();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Email');
            $table->integer('Telefono');
            $table->string('Direccion');
            $table->foreignId('tipo_cliente_id')->default(1)
            ->references('tipo_cliente_id')->on('tipo_clientes')
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

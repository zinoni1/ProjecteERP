<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->text('Descripcion');
            $table->decimal('Precio', 8, 2);
            $table->integer('Stock');
            $table->date('FechaEntrada');
            $table->foreignId('categoria_id')->constrained('categorias'); // Asegúrate de que coincida con el nombre de la tabla de categorías
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productes');
    }
}

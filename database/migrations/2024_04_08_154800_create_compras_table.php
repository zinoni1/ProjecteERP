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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime("FechaCompra");
            $table->foreignId('user_id')->default(1)->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('vendedor_id')->default(1)->references('id')->on('vendedors')->onDelete('cascade');
            $table->decimal('PrecioTotal', 8, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};

<?php
namespace Database\Factories;

use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;
class CompraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'FechaCompra' => $this->faker->dateTimeThisDecade(), // Corrección aquí
            'Cantidad' => $this->faker->randomNumber(),
            'producte_id' => \App\Models\Producte::factory(),
            'user_id' => \App\Models\User::factory(), // Corrección aquí
            'vendedor_id' => \App\Models\Vendedor::factory(),
        ];
    }
}

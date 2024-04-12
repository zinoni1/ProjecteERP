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

        ];
    }
}

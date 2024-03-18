<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VentaDetalle;
use App\Models\VentaPropuesta;
use App\Models\Producte;
use App\Models\VentaPropuestaProducto;
use App\Models\Cliente;
use App\Models\TipoCliente;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producte>
 */
class ProducteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->name,
            'Descripcion' => $this->faker->text,
            'Precio' => $this->faker->randomFloat(2, 0, 100),
            'Stock' => $this->faker->numberBetween(0, 100),
            'FechaEntrada' => $this->faker->date(),

        ];
    }
}

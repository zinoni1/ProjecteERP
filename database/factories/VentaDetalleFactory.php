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
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VentaDetalle>
 */
class VentaDetalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CantidadVendida' => $this->faker->numberBetween(1, 10),
            'PrecioUnitario' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}

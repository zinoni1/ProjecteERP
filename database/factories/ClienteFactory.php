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
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
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
            'Apellido' => $this->faker->lastName,
            'Email' => $this->faker->unique()->safeEmail,
            'Telefono' => $this->faker->name,
            'Direccion' => $this->faker->address,
            'Poblacion' => $this->faker->name,
        ];
    }
}

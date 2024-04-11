<?php

namespace Database\Factories;

use App\Models\Producte;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProducteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->name,
            'Descripcion' => $this->faker->text,
            'Precio' => $this->faker->randomFloat(2, 0, 100),
            'Stock' => $this->faker->numberBetween(0, 100),
            'FechaEntrada' => $this->faker->date(),
            'categoria_id' => \App\Models\Categoria::factory()->create()->id,
            'ruta' => $this->faker->imageUrl(),
        ];
    }
}

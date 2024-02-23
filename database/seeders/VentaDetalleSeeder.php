<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VentaPropuesta;
use App\Models\VentaDetalle;

class VentaDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ventaPropuestas = VentaPropuesta::all();

        // Crear 10 VentaDetalles asignando aleatoriamente una VentaPropuesta existente a cada uno
        VentaDetalle::factory(10)->create([
            'VentaPropuestaID' => $ventaPropuestas->random()->id,
        ]);
    }
}

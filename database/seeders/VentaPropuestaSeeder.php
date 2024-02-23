<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producte;
use App\Models\VentaPropuesta;

class VentaPropuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //n:m ventrapropuesta y producto
        \App\Models\VentaPropuesta::factory(10)->has(\App\Models\Producte::factory(10))->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//compra factory
use App\Models\Compra;
use App\Models\Producte;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Compra::factory(10)->has(\App\Models\Producte::factory(10))->create();
    }
}

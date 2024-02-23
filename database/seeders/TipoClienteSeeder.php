<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\TipoCliente;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //relacion 1:n entre tipo_cliente y cliente
        \App\Models\TipoCliente::factory(1)->has(\App\Models\Cliente::factory(10))->create();
    }
}

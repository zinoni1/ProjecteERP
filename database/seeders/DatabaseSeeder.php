<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ClienteSeeder;
use Database\Seeders\ProducteSeeder;
use Database\Seeders\TipoClienteSeeder;
use Database\Seeders\VentaDetalleSeeder;
use Database\Seeders\VentaPropuestaSeeder;
use Database\Seeders\VentaPropuestaProductoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            TipoClienteSeeder::class,
 ClienteSeeder::class,
                    ProducteSeeder::class,
                    VentaPropuestaSeeder::class,
                    VentaDetalleSeeder::class,
                    VentaPropuestaProductoSeeder::class,

        ]);
    }
}

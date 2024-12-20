<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TipoUsuarioSeeder::class,
            EmpleadoSeeder::class,
            RazaSeeder::class,
            TipoMascotaSeeder::class,
            GeneroSeeder::class,
            EtapaSeeder::class,
            CategoriaSeeder::class,
            MarcaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            AdminSeeder::class,
        ]);
    }
}

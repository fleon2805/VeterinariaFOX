<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazaSeeder extends Seeder
{
    public function run()
    {
        DB::table('razas')->insert([
            ['raza' => 'Pastor Alemán'],
            ['raza' => 'Golden Retriever'],
            ['raza' => 'Labrador'],
            ['raza' => 'Persa'],
            ['raza' => 'Siames'],
            ['raza' => 'Angora'],
            ['raza' => 'Gigante de Flandes'],
            ['raza' => 'Enano Holandés'],
            // Añade más razas según sea necesario
        ]);
    }
}

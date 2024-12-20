<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['tipo_mascota' => 'Perro'],
            ['tipo_mascota' => 'Gato'],
            ['tipo_mascota' => 'Ave'],
            // Añade más categorías según sea necesario
        ]);
    }
}

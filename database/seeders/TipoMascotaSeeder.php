<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMascotaSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_mascotas')->insert([
            ['tipo' => 'Perro'],
            ['tipo' => 'Gato'],
            ['tipo' => 'Conejo'],
            // Añade más tipos según sea necesario
        ]);
    }
}

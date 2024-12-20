<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    public function run()
    {
        DB::table('marcas')->insert([
            ['nombre' => 'Frontline', 'descripcion' => 'Descripción de FrontLine'],
            ['nombre' => 'Clean Pets', 'descripcion' => 'Descripción de Clean Pets'],
            ['nombre' => 'Hartz', 'descripcion' => 'Descripción de Hartz'],
            ['nombre' => 'Ferplast', 'descripcion' => 'Descripción de Ferplast'],
            ['nombre' => 'Purina', 'descripcion' => 'Descripción de Purina'],
        ]);
    }
}

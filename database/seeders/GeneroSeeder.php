<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    public function run()
    {
        DB::table('generos')->insert([
            ['genero' => 'Macho'],
            ['genero' => 'Hembra'],
        ]);
    }
}

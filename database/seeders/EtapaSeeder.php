<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtapaSeeder extends Seeder
{
    public function run()
    {
        DB::table('etapas')->insert([
            ['edad' => 'Cachorro'],
            ['edad' => 'Adulto'],
            ['edad' => 'Senior'],
        ]);
    }
}

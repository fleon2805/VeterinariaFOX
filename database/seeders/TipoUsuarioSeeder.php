<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            ['tipo' => 'Administrador'],
            ['tipo' => 'Empleado'],
            ['tipo' => 'Cliente'],
        ]);
    }
}
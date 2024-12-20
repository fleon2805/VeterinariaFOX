<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'usuario' => 'admin',
            'contraseña' => Hash::make('admin'),
            'correo' => 'admin@fox.com',
            'id_tipo_usuario' => 1, // Asegúrate de que este es el ID correcto para el tipo de usuario Administrador
        ]);
    }
}

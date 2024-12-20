<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    public function run()
    {
        // Crear un registro para el empleado en la tabla empleados
        $empleado = Empleado::create([
            'nombre' => 'Javier',
            'apellidos' => 'Garcia', // Cambiado a 'apellidos' para coincidir con la migración
            'dni' => '12345678', // Añadido un valor único para el DNI
            'direccion' => 'Av. La Molina 258', // Añadido un valor para dirección
            'telefono' => '123456789',
            'fecha_ingreso' => now(), // Añadido un valor para fecha_ingreso
            'salario' => 1200.00, // Añadido un valor para salario
        ]);

        // Crear un usuario relacionado con el empleado
        Usuario::create([
            'usuario' => 'empleado@fox.com',
            'contraseña' => Hash::make('123456789'),
            'correo' => 'empleado@fox.com',
            'id_tipo_usuario' => 2, // Asegúrate de que este es el ID correcto para el tipo de usuario empleado
            'id_empleado' => $empleado->id_empleado, // Utilizar el ID del empleado recién creado
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedores')->insert([
            ['nombre' => 'Mars Perú', 'direccion' => 'Av. Circunvalacion 256', 'telefono' => '956321458', 'email' => 'mars@abc.com'],
            ['nombre' => 'Nestlé Purina', 'direccion' => 'Av. La marina 145', 'telefono' => '987654321', 'email' => 'nestle@purina.com'],
            ['nombre' => 'Montana S.A.', 'direccion' => 'Av. Faucett 1478', 'telefono' => '946325814', 'email' => 'montana@abc.com'],
            ['nombre' => 'Vetpharma', 'direccion' => 'Av. Tupac Amaru 101', 'telefono' => '926985003', 'email' => 'vetphar@empresa.com'],
            ['nombre' => 'Química Suiza', 'direccion' => 'Av. Risso 1160', 'telefono' => '910258850', 'email' => 'qsuiza@productos.com'],
            ['nombre' => 'Invetsa', 'direccion' => 'Av. El Olivar 1258', 'telefono' => '960003580', 'email' => 'invetsa@cuidados.com'],
            ['nombre' => 'Rintisa S.A.', 'direccion' => 'Av. Los Dominicos 147', 'telefono' => '978963965', 'email' => 'rintisa@prod.com'],
        ]);
    }
}

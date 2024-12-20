<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Ricocan',
                'presentacion' => 'Bolsa',
                'fecha_vencimiento' => Carbon::now()->addMonths(6),
                'stock' => 100,
                'precio_unitario' => 10.50,
                'id_categoria' => 1,
                'id_marca' => 1,
                'id_proveedor' => 1,
                'id_etapa' => 1,
            ],
            [
                'nombre' => 'Ricocat',
                'presentacion' => 'Bolsa',
                'fecha_vencimiento' => Carbon::now()->addMonths(12),
                'stock' => 200,
                'precio_unitario' => 20.75,
                'id_categoria' => 2,
                'id_marca' => 2,
                'id_proveedor' => 2,
                'id_etapa' => 2,
            ],
            [
                'nombre' => 'Mimaskot',
                'presentacion' => 'Bolsa',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 150,
                'precio_unitario' => 33.60,
                'id_categoria' => 3,
                'id_marca' => 5,
                'id_proveedor' => 5,
                'id_etapa' => 3,
            ],
            [
                'nombre' => 'Canbo',
                'presentacion' => 'Caja',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 120,
                'precio_unitario' => 28.50,
                'id_categoria' => 2,
                'id_marca' => 4,
                'id_proveedor' => 1,
                'id_etapa' => 2,
            ],
            [
                'nombre' => 'Pedigree',
                'presentacion' => 'Caja',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 60,
                'precio_unitario' => 32.20,
                'id_categoria' => 1,
                'id_marca' => 1,
                'id_proveedor' => 6,
                'id_etapa' => 1,
            ],
            [
                'nombre' => 'Pet Life',
                'presentacion' => 'Botella',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 80,
                'precio_unitario' => 25.80,
                'id_categoria' => 3,
                'id_marca' => 5,
                'id_proveedor' => 4,
                'id_etapa' => 1,
            ],
            [
                'nombre' => 'PeruPet',
                'presentacion' => 'Caja',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 15,
                'precio_unitario' => 11.60,
                'id_categoria' => 3,
                'id_marca' => 5,
                'id_proveedor' => 1,
                'id_etapa' => 3,
            ],
            [
                'nombre' => 'Chalesco',
                'presentacion' => 'Botella',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 20,
                'precio_unitario' => 10.00,
                'id_categoria' => 2,
                'id_marca' => 2,
                'id_proveedor' => 7,
                'id_etapa' => 2,
            ],
            [
                'nombre' => 'BayVet',
                'presentacion' => 'Botella',
                'fecha_vencimiento' => Carbon::now()->addMonths(18),
                'stock' => 19,
                'precio_unitario' => 18.50,
                'id_categoria' => 1,
                'id_marca' => 5,
                'id_proveedor' => 5,
                'id_etapa' => 1,
            ],
        ]);
    }
}

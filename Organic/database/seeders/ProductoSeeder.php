<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
        [
            'nombre' => 'Shampoo de cebolla',
            'descripcion' => 'Shampoo natural de cebolla para cabello graso',
            'precio' => '20000',
            'cantidad_disponible' => 50,
            'id_categoria' => 1,
            'id_condicion' => 2,
            'id_tipo' => 2,
        ],

        [
            'nombre' => 'Acondicionador de coco',
            'descripcion' => 'Acondicionador natural de coco para cabello seco',
            'precio' => '25000',
            'cantidad_disponible' => 30,
            'id_categoria' => 2,
            'id_condicion' => 1,
            'id_tipo' => 1,
        ]
    ];

        foreach($productos as $producto){
            Producto::create($producto);
        }
    }
}
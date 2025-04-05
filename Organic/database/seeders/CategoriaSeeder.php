<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre'=>'Shampoo',
                'descripcion'=>'Producto para lavar el cabello',
            ],
            [
                'nombre'=>'Acondicionador',
                'descripcion'=>'producto para hidratar post-shampoo',
            ],
            [
                'nombre'=>'Tratamiento',
                'descripcion'=>'producto para el cuidado y reparación del cabello',
            ],
        ];

        foreach ($categorias as $categoria){
            Categoria::create($categoria);
        }
    }
}

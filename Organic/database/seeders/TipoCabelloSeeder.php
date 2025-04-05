<?php

namespace Database\Seeders;

use App\Models\TipoCabello;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoCabelloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre'=>'Liso',
                'descripcion'=>'Cabello manejable sin ondulaciones',
            ],
            [
                'nombre'=>'Ondulado',
                'descripcion'=>'Cabello con ligeras ondulaciones',
            ],
            [
                'nombre'=>'Rizado',
                'descripcion'=>'Cabello con ondulaciones mas pronunciadas',
            ],
            [
                'nombre'=>'Crespo',
                'descripcion'=>'Cabello mas grueso y muy ondulado',
            ],
        ];

        foreach($tipos as $tipo){
            TipoCabello::create($tipo);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CondicionCabello;

class CondicionCabelloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $condiciones = [
            [
                'nombre'=>'Seco',
                'descripcion'=>'Cabello sin hidratación',
            ],
            [
                'nombre'=>'Graso',
                'descripcion'=>'Cabello con muchos aceites naturales',
            ],
        ];

        foreach($condiciones as $condicion){
            CondicionCabello::create($condicion);
        }
    }
}

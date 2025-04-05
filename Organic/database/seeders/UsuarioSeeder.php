<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre'=>'Santiago Ramirez',
            'correo'=>'admin@gmail.com',
            'telefono'=>'3108021637',
            'direccion'=>'soacha',
            'password'=>'123',
            'rol'=>'administrador',
        ]);
    }
}

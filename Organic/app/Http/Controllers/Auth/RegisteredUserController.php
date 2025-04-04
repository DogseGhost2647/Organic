<?php

<<<<<<< HEAD
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;


class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.registro');
    }

    public function store(){
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'telefono' => ['required', 'string', 'max:20', 'unique:usuarios'],
            'direccion' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol' => ['required', 'in:cliente,administrador'],
        ])

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ])

        event(new Registered($usuario));

        return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
    }
}
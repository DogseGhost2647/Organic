<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;


class AuthController extends Controller{

    public function showLoginForm()
{
    return view('auth.login');
}


    public function login(Request $request)
{
    $credenciales = $request->validate([
        'correo' => 'required|email',
        'password' => 'required'
    ]);

    $usuario = Usuario::where('correo', $credenciales['correo'])->first();

    if ($usuario && Hash::check($credenciales['password'], $usuario->password)) {
        Auth::login($usuario);
        $request->session()->regenerate();

        if ($usuario->rol === 'administrador') {
            return redirect()->route('productos.index');
        } else {
            return redirect()->route('home');
        }
    }

    return back()->withErrors([
        'correo' => 'Las credenciales no coinciden con nuestros registros'
    ]);
}
}

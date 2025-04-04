<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Usuario;
use App\Services\CarritoService;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    protected $carritoService;

    public function __construct(CarritoService $carritoService)
    {
        $this->carritoService = $carritoService;
    }
    public function index()
    {
        $carrito = Carrito::with(['producto'])->get();
        $productos = Producto::all();

        return view('carrito.index', compact('carrito'));
    }

    public function create()
    {
        return view ('carrito.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'cantidad' => 'required|integer|min:1',
        ]);
        Carrito::create($request->all());
        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    public function show(Carrito $carrito)
    {
        return view('carrito.show', compact('carrito'));
    }

    public function edit(Carrito $carrito)
    {
        return view('carrito.edit', compact('carrito'));
    }

    public function update(Request $request, Carrito $carrito)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);
        $carrito->update($request->all());
        return redirect()->route('carrito.index')->with('success', 'Carrito actualizado.');
    }

    public function destroy(Carrito $carrito)
    {
        $carrito->delete();
        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    }
    
    
}

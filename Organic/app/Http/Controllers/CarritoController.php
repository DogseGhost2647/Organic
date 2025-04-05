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

        $carritos = Carrito::with(['producto', 'usuario'])->get();
        $productos = Producto::all();
        $usuarios = Usuario::all();

        return view('carritos.index', compact('carritos', 'productos', 'usuarios'));

    }

    public function create()
    {

        $productos = Producto::all();
        $usuarios = Usuario::all();

        return view('carritos.create', compact('productos', 'usuarios'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad_productos' => 'required|integer|min:1',
            'precio_total' => 'required|numeric'
        ]);

        Carrito::create([
            'id_usuario' => $request->id_usuario,
            'id_producto' => $request->id_producto,
            'cantidad_productos' => $request->cantidad_productos,
            'precio_total' => $request->precio_total,
        ]);

        return redirect()->route('carritos.index')->with('success', 'Producto agregado al carrito.');
        
    }

    public function show(Producto $producto)
    {
        //
    }

    public function edit(Carrito $carrito)
    {

    $usuarios = Usuario::all();
    $productos = Producto::all();

    return view('carritos.edit', compact('carrito', 'usuarios', 'productos'));
    
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad_productos' => 'required|integer|min:1',
            'precio_total' => 'required|numeric'
        ]);

        $carrito = Carrito::findOrFail($id);
    
        $carrito->update([
            'id_usuario' => $request->id_usuario,
            'id_producto' => $request->id_producto,
            'cantidad_productos' => $request->cantidad_productos,
            'precio_total' => $request->precio_total,

        ]);
    
        return redirect()->route('carritos.index')->with('success', 'Carrito actualizado correctamente.');

    }

    public function destroy($id)
    {
        
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
        
        return redirect()->route('carritos.index')->with('success', 'Carrito eliminado en exito.');

    }
}
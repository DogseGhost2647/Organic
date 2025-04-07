<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Usuario;
use App\Services\CarritoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarritoController extends Controller
{
    protected $carritoService;

    public function __construct(CarritoService $carritoService)
    {

        $this->carritoService = $carritoService;

    }

    public function index()
{

    $carrito = Carrito::with('producto')->where('id_usuario', Auth::id())->get();

    $cantidadTotal = Carrito::where('id_usuario', Auth::id())
        ->sum('cantidad_productos');

    $totalGeneral = $carrito->sum('precio_total');

    return view('carrito.index', compact('carrito', 'cantidadTotal', 'totalGeneral'));

}

    public function create()
    {
        $productos = Producto::all();
        return view ('carrito.create', compact('productos'));
    }

    public function store(Request $request)
{
    $productoId = $request->input('id_producto');
    $cantidad_productos = $request->input('cantidad_productos', 1);

    $producto = Producto::find($productoId);

    if (!$producto) {
        return redirect()->back()->with('error', 'Producto no encontrado');
    }

    // Verificar si el producto ya está en el carrito del usuario
    $carritoExistente = Carrito::where('id_usuario', Auth::id())
        ->where('id_producto', $productoId)
        ->first();

    if ($carritoExistente) {
        // Si existe, actualiza la cantidad y el precio total
        $carritoExistente->cantidad_productos += $cantidad_productos;
        $carritoExistente->precio_total = $carritoExistente->cantidad_productos * $producto->precio;
        $carritoExistente->save();
    } else {
        // Si no existe, crea un nuevo registro calculando el precio total
        Carrito::create([
            'id_usuario' => Auth::user()->id,
            'id_producto' => $producto->id,
            'cantidad_productos' => $cantidad_productos,
            'precio_total' => $producto->precio * $cantidad_productos,
        ]);        
    }

    return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito');
}

    public function show(Carrito $carrito)
    {
        //
    }

    public function edit(Carrito $carrito)
    {

    $usuarios = Usuario::all();
    $productos = Producto::all();

    return view('carritos.edit', compact('carrito', 'usuarios', 'productos'));
    
    }

    public function update(Request $request, Carrito $carrito)
{
    $request->validate([
        'cantidad_productos' => 'required|integer|min:1',
    ]);

    $carrito->cantidad_productos = $request->input('cantidad_productos');
    $carrito->precio_total = $carrito->cantidad_productos * $carrito->producto->precio;
    $carrito->save();

    return redirect()->route('carrito.index')->with('success', 'Carrito actualizado.');
}


public function destroy($id)
{
    $item = Carrito::find($id);

    if ($item) {
        $item->delete();
        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito.');
    } else {
        return redirect()->route('carrito.index')->with('error', 'Producto no encontrado.');
    }
}

public function vaciar()
{
    // Elimina todos los productos del carrito del usuario autenticado
    Carrito::where('id_usuario', Auth::id())->delete();

    return redirect()->route('carrito.index')->with('success', 'Todos los productos han sido eliminados del carrito.');
}


}

<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Contracts\ProductoServiceInterface;
use App\Models\Categoria;
use App\Models\CondicionCabello;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoServiceInterface $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
{   
    $productos = Producto::with(['categoria', 'condicionCabello'])->get();
    $categorias = Categoria::all();
    $condiciones = CondicionCabello::all();

    return view('productos.index', compact('productos', 'categorias', 'condiciones'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $condiciones = CondicionCabello::all();

        return view('productos.create', compact('categorias','condiciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'id_condicion' => 'required|exists:condicion_cabellos,id',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad_disponible' => $request->cantidad_disponible,
            'id_categoria' => $request->id_categoria,
            'id_condicion' => $request->id_condicion,
            'id_tipo' => $request->tipo_cabello,
        ]);


        return redirect()->route('productos.create')->with('success', 'Producto creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $condiciones = CondicionCabello::all();

        return view('productos.update', compact('productos', 'categorias', 'condiciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
        'cantidad_disponible' => 'required|integer',
        'id_categoria' => 'required|exists:categorias,id',
        'id_condicion' => 'required|exists:condicion_cabellos,id',
    ]);

    $producto->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'cantidad_disponible' => $request->cantidad_disponible,
        'id_categoria' => $request->id_categoria,
        'id_condicion' => $request->id_condicion,
    ]);

    return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $this->productoService->eliminarProducto($producto->id);
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}

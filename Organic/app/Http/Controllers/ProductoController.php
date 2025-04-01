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
        $productos = $this->productoService->listarProductos();
        return view('productos.index');
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
            'estado' => 'required|in:disponible,no disponible',
            'id_categoria' => 'required|exists:categorias,id',
            'condicion_cabello' => 'required|exists:condiciones,id',
            'tipo_cabello' => 'required|exists:tipos,id',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad_disponible' => $request->cantidad_disponible,
            'estado' => $request->estado,
            'id_categoria' => $request->id_categoria,
            'condicion_cabello' => $request->condicion_cabello,
            'tipo_cabello' => $request->tipo_cabello,
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

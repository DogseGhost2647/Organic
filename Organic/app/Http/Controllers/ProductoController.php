<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Contracts\ProductoServiceInterface;
use App\Models\Categoria;
use App\Models\CondicionCabello;
use App\Models\TipoCabello;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoServiceInterface $productoService)
    {
        $this->productoService = $productoService;
    }

    public function inicio(){
        $productos = Producto::where('estado', 'disponible')->get();
        return view('inicio', compact('productos'));
    }

    public function index()
{   
    $productos = Producto::with(['categoria', 'condicionCabello'])->get();
    $categorias = Categoria::all();
    $condiciones = CondicionCabello::all();
    $tipos = TipoCabello::all();

    return view('productos.index', compact('productos', 'categorias', 'condiciones', 'tipos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $condiciones = CondicionCabello::all();
        $tipos = TipoCabello::all();

        return view('productos.create', compact('categorias','condiciones','tipos'));
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
            'id_tipo' => 'required|exists:tipo_cabellos,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $nombreImagen = $request->file('imagen')->getClientOriginalName();
                $rutaImagen = $request->file('imagen')->store('productos', 'public'); 
            }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad_disponible' => $request->cantidad_disponible,
            'id_categoria' => $request->id_categoria,
            'id_condicion' => $request->id_condicion,
            'id_tipo' => $request->id_tipo,
            'imagen' => $rutaImagen,
        ]);


        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente!');
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

    return view('productos.update', compact('producto', 'categorias', 'condiciones'));
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
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Manejar imagen nueva si se sube
    if ($request->hasFile('imagen')) {
        $rutaImagen = $request->file('imagen')->store('productos', 'public');
    } else {
        $rutaImagen = $producto->imagen; // Mantener la imagen actual
    }

    $producto->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'cantidad_disponible' => $request->cantidad_disponible,
        'id_categoria' => $request->id_categoria,
        'id_condicion' => $request->id_condicion,
        'imagen' => $rutaImagen, // Guardar la imagen actualizada
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

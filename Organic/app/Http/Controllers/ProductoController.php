<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
<<<<<<< HEAD
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

    public function inicio(){
        $productos = Producto::where('estado', 'disponible')->get();
        return view('inicio', compact('productos'));
    }

    public function index()
{   
    $productos = Producto::with(['categoria', 'condicionCabello'])->get();
    $categorias = Categoria::all();
    $condiciones = CondicionCabello::all();

    return view('productos.index', compact('productos', 'categorias', 'condiciones'));
}
=======

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
>>>>>>> jose

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        $categorias = Categoria::all();
        $condiciones = CondicionCabello::all();

        return view('productos.create', compact('categorias','condiciones'));
=======
        //
>>>>>>> jose
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'id_condicion' => 'required|exists:condicion_cabellos,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $rutaImagen = $request->file('imagen')->store('productos', 'public'); // Guarda en storage/app/public/productos
            }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad_disponible' => $request->cantidad_disponible,
            'id_categoria' => $request->id_categoria,
            'id_condicion' => $request->id_condicion,
            'id_tipo' => $request->tipo_cabello,
            'imagen' => $rutaImagen,
        ]);


        return redirect()->route('productos.create')->with('success', 'Producto creado exitosamente!');
=======
        //
>>>>>>> jose
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
<<<<<<< HEAD
{
    $categorias = Categoria::all();
    $condiciones = CondicionCabello::all();

    return view('productos.update', compact('producto', 'categorias', 'condiciones'));
}
=======
    {
        //
    }
>>>>>>> jose

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
<<<<<<< HEAD
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

=======
    {
        //
    }

>>>>>>> jose
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
<<<<<<< HEAD
        $this->productoService->eliminarProducto($producto->id);
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
=======
        //
>>>>>>> jose
    }
}

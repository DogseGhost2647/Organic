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

    public function inicio()
    {
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

    public function create()
    {
        $categorias = Categoria::all();
        $condiciones = CondicionCabello::all();
        $tipos = TipoCabello::all();

        return view('productos.create', compact('categorias', 'condiciones', 'tipos'));
    }

    public function store(Request $request)
    {
        // Validar la entrada del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'cantidad_disponible' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
            'id_condicion' => 'required|exists:condicion_cabellos,id',
            'id_tipo' => 'required|exists:tipo_cabellos,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $productoExistente = Producto::where('nombre', $request->nombre)->first();

        $ruta = null;

        // Verificar si se subió una imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            // Guardamos solo el nombre relativo de la imagen
            $ruta = $imagen->storeAs('imagenes', $nombreImagen, 'public');
        }

        if ($productoExistente) {
            // Si el producto ya existe, solo actualizamos la cantidad
            $productoExistente->cantidad_disponible += $request->cantidad_disponible;

            if ($ruta) {
                // Si hay una nueva imagen, actualizamos la ruta
                $productoExistente->imagen = $ruta; 
            }

            $productoExistente->save();
        } else {
            // Si el producto no existe, lo creamos con la nueva imagen
            Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'cantidad_disponible' => $request->cantidad_disponible,
                'id_categoria' => $request->id_categoria,
                'id_condicion' => $request->id_condicion,
                'id_tipo' => $request->id_tipo,
                'estado' => 'disponible',
                'imagen' => $ruta,  // Guardamos solo la ruta relativa
            ]);
        }

        return redirect()->route('productos.index')->with('success', 'Producto guardado correctamente.');
    }

    public function showAgregarExistenciasForm()
    {
        $productos = Producto::all(); // Obtener todos los productos
        return view('productos.stock', compact('productos'));
    }

    public function agregarExistencias(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'producto_id' => 'required|exists:productos,id', // Verifica que el producto exista
            'cantidad_disponible' => 'required|integer|min:1', // Validar que la cantidad a agregar sea mayor a 0
        ]);

        // Obtener el producto
        $producto = Producto::findOrFail($request->producto_id);

        // Aumentar la cantidad de stock
        $producto->cantidad_disponible += $request->cantidad_disponible;

        // Guardar el producto actualizado
        $producto->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Stock actualizado correctamente.');
    }

    public function show(Producto $producto)
    {
        //
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $condiciones = CondicionCabello::all();

        return view('productos.update', compact('producto', 'categorias', 'condiciones'));
    }

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
            $rutaImagen = $producto->imagen; // Mantener la imagen actual si no se sube una nueva
        }

        // Actualizar el producto
        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad_disponible' => $request->cantidad_disponible,
            'id_categoria' => $request->id_categoria,
            'id_condicion' => $request->id_condicion,
            'imagen' => $rutaImagen, // Guardamos la imagen actualizada
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $this->productoService->eliminarProducto($producto->id);
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}

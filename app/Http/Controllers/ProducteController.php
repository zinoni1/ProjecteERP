<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ProducteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producte::all(); // O cualquier otra lógica para obtener los productos
        return view('productes', compact('productos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías

        return view('crearProducte', compact('categorias'));
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required|numeric',
            'Stock' => 'required|integer',
            'FechaEntrada' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id', // Asegúrate de que la categoría exista
        ]);

        Producte::create($request->all());

        return redirect()->route('mostrarProductos')->with('success', 'Producto creado exitosamente.');
    }


    
    /**
     * Display the specified resource.
     */
    public function show(Producte $producte)
{
    $categorias = Categoria::all(); // Obtener todas las categorías
    return view('mostrarProducte', compact('producte', 'categorias'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producte $producte)
    {
        return view('mostrarProducte', compact('producte'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producte $producte)
    {
        // Validación de los campos del formulario
        $this->validate($request, [
            'Nombre' => 'required',
            'Descripcion' => 'required',
            //'Categoria' => 'required',
            'Precio' => 'required',
            'Stock' => 'required',
            'FechaEntrada' => 'required',
        ]);
    
        // Actualización de los datos del producto
        $producte->update($request->all());
    
        // Redirección después de la actualización
        return redirect()->route('mostrarProductos')->with('success', 'Producto actualizado exitosamente');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producte $producte)
    {
        $producte->delete();
    
        return redirect()->route('mostrarProductos')
                        ->with('success', 'Producto eliminado exitosamente');
    }
 public function productos()
    {
        $productos = Producte::all(); // Obtener todos los productos
    
        return view('productes', ['productos' => $productos]);
    }
    public function mostrarProductos(Request $request)
    {
        $order = $request->input('order');
    
        // Verifica el valor del filtro y ajusta la consulta en consecuencia
        switch ($order) {
            case 'asc':
                $productos = Producte::orderBy('Stock', 'asc')->get();
                break;
            case 'desc':
                $productos = Producte::orderBy('Stock', 'desc')->get();
                break;
            case 'all':
                $productos = Producte::all();
                break;
            case 'less_than_10':
                $productos = Producte::where('Stock', '<=', 10)->get();
                break;
            case 'between_10_and_50':
                $productos = Producte::whereBetween('Stock', [11, 50])->get();
                break;
            default:
                $productos = Producte::all();
        }
    
        // Obtener todas las categorías
        $categorias = Categoria::all();
    
        return view('mostrarProductes', ['productos' => $productos, 'categorias' => $categorias]);
    }
    
    /*public function mostrarFormularioCrearCategoria()
    {
        return view('crearCategoria');
    }*/
    public function contarProductos()
    {
        // Consulta para contar los productos utilizando el modelo Producte
        $total_productos = Producte::count();
    
        // Pasar el resultado a la vista
        return view('index', ['total_productos' => $total_productos]);
    }
    
    
}

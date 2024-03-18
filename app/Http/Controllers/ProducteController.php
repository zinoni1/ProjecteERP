<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use Illuminate\Http\Request;

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
        return view("createProducte");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Precio' => 'required',
            'Stock' => 'required',
            'FechaEntrada' => 'required',
            // No hay validación para la imagen
        ]);

        $data = $request->all();

        Producte::create($data);

        // Retrieve all products after creating a new one
        $productos = Producte::all();

        return view('mostrarProductes', compact('productos'))->with('success', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producte $producte)
    {
        // Puedes implementar esta función si necesitas mostrar detalles específicos del producto.
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producte $producte)
    {
        // Puedes implementar esta función si necesitas editar detalles específicos del producto.
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producte $producte)
    {
        // Puedes implementar esta función si necesitas actualizar detalles específicos del producto.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producte $producte)
    {
        // Puedes implementar esta función si necesitas eliminar el producto.
    }
    public function mostrarProductos()
{
    $productos = Producte::all(); // Suponiendo que tienes un modelo llamado Producto

    return view('productes', ['productos' => $productos]);
}
}

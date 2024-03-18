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
        return view('mostrarProducte', compact('producte'));
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
            'Precio' => 'required',
            'Stock' => 'required',
            'FechaEntrada' => 'required',
        ]);
    
        // Actualización de los datos del producto
        $producte->update($request->all());
    
        // Redirección después de la actualización
        return redirect()->route('mostrarProductes')->with('success', 'Producto actualizado exitosamente');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producte $producte)
    {
        $producte->delete();
    
        return redirect()->route('mostrarProductes')
                        ->with('success', 'Producto eliminado exitosamente');
    }
    public function mostrarProductos()
{
    $productos = Producte::all(); // Suponiendo que tienes un modelo llamado Producto

    return view('productes', ['productos' => $productos]);
}
}

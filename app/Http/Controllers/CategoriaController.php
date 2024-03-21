<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producte;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('crearCategoria'); 
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
   

    Categoria::create([
        'Categoria' => $request->Categoria,
    ]);

    return redirect()->route('mostrarProductos')->with('success', 'Categoría creada exitosamente.');
}
    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        // Obtenemos la categoría junto con sus productos
        $categoria = Categoria::with('productes')->findOrFail($categoria->id);

        // Pasamos la categoría con sus productos a la vista
        return view('mostrarCategoria', compact('categoria'));
    }


    
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update([
            'Categoria' => $request->Categoria,
        ]);

        return redirect()->route('mostrarProductos')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('mostrarCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('mostrarProductos')->with('success', 'Categoría eliminada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
  
}

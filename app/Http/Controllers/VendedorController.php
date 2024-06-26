<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producte;
use App\Models\Categoria;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendedores = Vendedor::all();
        return view('vendedors', compact('vendedores'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        return view('crearVenedor');

  
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
   

    // Crear un nuevo vendedor con los datos del formulario
    $vendedor = new Vendedor();
    $vendedor->NombreVendedor = $request->nombreVendedor;
    $vendedor->Direccion = $request->Direccion;
    $vendedor->Telefono = $request->Telefono;

    // Guardar el vendedor en la base de datos
    $vendedor->save();

    // Redirigir a la página de lista de vendedores
    return redirect()->route('venedors.index');
     
    }
    
    

    /**
     * Display the specified resource.
     */
    public function edit(Vendedor $vendedor)
    {
        return view('editVendedor', compact('vendedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendedor $vendedor)
    {
        $request->validate([
            'nombreVendedor' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
        ]);

        $vendedor->update($request->all());

        return redirect()->route('venedors.index')->with('success', 'Vendedor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendedor $vendedor)
    {
        dd($vendedor);
        $vendedor->delete();
    
        return redirect()->route('venedors.index')->with('success', 'Vendedor eliminado exitosamente.');
    }
    

}
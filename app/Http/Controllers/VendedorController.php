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
        $vendedors = Vendedor::all(); // Obtiene todos los vendedores
        return view('compras', ['vendedors' => $vendedors]); // Pasa los vendedores a la vista
    }

    /**
     * Show the form for creating a new resource.
     */     public function create()
    {
        $usuarios = User::all(); 
        $categorias = Categoria::all(); 
        
        return view('crearCompra', ['usuarios' => $usuarios, 'categorias' => $categorias]); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreVendedor' => 'required|string',
            'Estado' => 'required|string|in:Aceptado,Pendiente,Rechazado',
            'Detalle' => 'required|string',
            'name',
            'Nombre' => 'required|string',
            'Descripcion' => 'required|string',
            'Precio' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:0',
            'FechaEntrada' => 'required|date',
            'ruta' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        
    
        // Crear el producto
        $producte = new Producte();
        $producte->Nombre = $request->Nombre;
        $producte->Descripcion = $request->Descripcion;
        $producte->Precio = $request->Precio;
        $producte->Stock = $request->Stock;
        $producte->FechaEntrada = $request->FechaEntrada;
        $producte->ruta = $request->ruta; // Agregar $request->ruta aquí
        $producte->categoria_id = $request->categoria_id;
        $producte->save();
    
        // Obtener el ID del usuario

        // Crear la compra
        $vendedor = new Vendedor();
        $vendedor -> NombreVendedor = $request->NombreVendedor;
        $vendedor -> Estado = $request->Estado;
        $vendedor->Detalle = $request->Detalle;
        $vendedor->usuario_id = $request->usuario_id;
        $vendedor->producte_id =$request->id;
        $vendedor->save();

    
        return redirect()->route('compras.index')->with('success', 'Compra creada exitosamente.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Vendedor $vendedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendedor $vendedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendedor $vendedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendedor $vendedor)
    {
        //
    }
}

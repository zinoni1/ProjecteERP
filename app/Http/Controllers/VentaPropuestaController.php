<?php

namespace App\Http\Controllers;

use App\Models\VentaPropuesta;
use Illuminate\Http\Request;
use App\Models\VentaDetalle;

class VentaPropuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventes = VentaPropuesta::with('productes', 'ventaDetalles', 'cliente')->get();
        return view('ventas', compact('ventes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $venta = VentaPropuesta::where('id', $id)->
        with('productes', 'ventaDetalles', 'cliente')->first();

        return view('venta_proposta', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VentaPropuesta $ventaPropuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VentaPropuesta $ventaPropuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VentaPropuesta $ventaPropuesta)
    {
        //
    }
}

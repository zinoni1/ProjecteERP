<?php

namespace App\Http\Controllers;

use App\Models\VentaPropuesta;
use Illuminate\Http\Request;
use App\Models\VentaDetalle;
use App\Models\VentaPropuestaProducto;
use App\Models\Cliente;
use App\Models\Producte;

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

    public function index_ventas($id)
    {
        $venta = VentaPropuesta::where('id', $id)->with('productes', 'ventaDetalles', 'cliente')->first();
        $ventaProductos = VentaPropuestaProducto::where('venta_propuesta_id', $id)->get();

        return view('mostrarventas', compact('venta', 'ventaProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Cliente::all();
        return view('crearProposta', compact('clients'));
    }

    public function posarProductesProposta()
{
    $venta = VentaPropuesta::latest()->first();
    $ventaProductos = VentaPropuestaProducto::where('venta_propuesta_id', $venta->id)->get();
    $productos = Producte::all();

    // Obtener el ID de la venta propuesta
    $venta_propuesta_id = $venta->id;

    return view('posarProductesProposta', compact('venta', 'ventaProductos', 'productos', 'venta_propuesta_id'));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $venta = new VentaPropuesta();
    $venta->Estado = $request->estat;
    $venta->Detalles = $request->Detalls;
    $venta->cliente_id = $request->client_id;
    $venta->save();

    return redirect()->route('ventas.posarProductesProposta', ['id' => $venta->id]);
}



public function storeProductes(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre_producto.*' => 'required',
        'cantidad.*' => 'required|numeric|min:1',
        // Asegúrate de agregar cualquier otra validación necesaria aquí
    ]);

    // Crear registros en la tabla producte_venta_propuesta
    foreach ($request->nombre_producto as $key => $idProducto) {
        if ($idProducto) {
            // Crear el registro en la tabla producte_venta_propuesta
            VentaPropuestaProducto::create([
                'producte_id' => $idProducto,
                'venta_propuesta_id' => $request->venta_propuesta_id,
                'CantidadVendida' => $request->cantidad[$key],
            ]);

            // Restar la cantidad vendida del stock del producto
            $producto = Producte::find($idProducto);
            if ($producto) {
                // Restar la cantidad vendida del stock
                $producto->Stock -= $request->cantidad[$key];
                $producto->save();
            }

        }
    }

    return redirect()->route('ventas.index');
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

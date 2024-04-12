<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vendedor;
use App\Models\Producte;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

use Carbon\Carbon as CarbonCarbon;
use App\Models\CompraProducto;





class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $compras = Compra::with('user', 'vendedor')->get();
    return view('compres', compact('compras'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $date = Carbon::now('Europe/Madrid');
        $user = Auth::user();
        $vendedores = Vendedor::all();
        $productos = Producte::all();
        return view('crearCompres', compact('date', 'user', 'vendedores', 'productos'));



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener el ID del usuario autenticado directamente
        $userId = Auth::id();

        // Asegurarse de que se está recibiendo el vendedor_id correctamente
        $vendedorId = $request->vendedor_id;

        // Obtener el producto comprado
        $producto = Producte::findOrFail($request->producte_id);

        // Calcular el precio total
        $precioTotal = $request->Cantidad * $producto->Precio;


        $compra = new Compra();
        $compra->FechaCompra = $request->fechaCompra;
        $compra->user_id = $userId;
        $compra->vendedor_id = $vendedorId;
        $compra->PrecioTotal = $precioTotal;
        $compra->save();
        // Crear la compra con el precio total calculado y los IDs correctos


        // Añadir la cantidad comprada al stock del producto
        $producto->Stock += $request->Cantidad;
        $producto->save();

        // Redirigir a la página de índice de compras con un mensaje de éxito
        return redirect()->route('compras.index')->with('success', 'Compra creada exitosamente.');
    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compra = Compra::where('id', $id)->
        with('vendedor', 'user')->first();
        $compraProductos = CompraProducto::where('compra_id', $id)->get();
        return view('compres_productes', compact('compra', 'compraProductos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }

}

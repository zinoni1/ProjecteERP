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
use App\Models\CompraProducto;
use App\Models\Cliente;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use Carbon\Carbon as CarbonCarbon;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function generateInvoiceBuy($id)
     {
         $compra = Compra::where('id', $id)->with('vendedor')->first();
         $clienteNombre = $compra->vendedor->NombreVendedor;
         $clienteDireccion = $compra->vendedor->Direccion;
         $clienteTelefono = $compra->vendedor->Telefono;

         $user = Auth::user();

         $customer = new Buyer([
             'name'          => $user->name,
             'custom_fields' => [
                 'email' => $user->email,
             ],
         ]);

         $seller = new Party([
             'name'          => $clienteNombre,
             'address'       => $clienteDireccion,
             'phone'         => $clienteTelefono,


         ]);
         $ventaProductos = CompraProducto::where('compra_id', $compra->id)->get();

         $items = [];
         foreach ($ventaProductos as $ventaProducto) {
             $producto = $ventaProducto->producte; // Obtener el producto asociado al CompraProducto
             $items[] = (new InvoiceItem())
                 ->title($producto->Nombre)
                 ->pricePerUnit($producto->Precio)
                 ->quantity($ventaProducto->Cantidad);
         }


         $invoice = Invoice::make()
             ->buyer($customer)
             ->seller($seller)
             ->taxRate(21)
             ->addItems($items)
             ->logo(public_path('Media/gazepa-removebg-preview.png'));

         return $invoice->stream();
     }

    public function index()
    {
        $compras = Compra::with('user', 'vendedor')->latest()->paginate(10); // Ordena las compras de más reciente a menos reciente
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
        // Obtain the ID of the authenticated user directly
        $userId = Auth::id();

        // Ensure that the vendedor_id is received correctly
        $vendedorId = $request->vendedor_id;

        // Save the purchase in the compras table
        $compra = new Compra();
        $compra->FechaCompra = $request->fechaCompra;
        $compra->user_id = $userId;
        $compra->vendedor_id = $vendedorId;
        $compra->save();

        // Verify if products and quantities were sent
        if ($request->has('producte_id') && $request->has('cantidad')) {
            // Iterate over the products and quantities received
            foreach ($request->producte_id as $index => $productoId) {
                // Obtain the purchased product
                $producto = Producte::findOrFail($productoId);

                // Save the relationship in the compra_producte table
                $compraProducto = new CompraProducto();
                $compraProducto->compra_id = $compra->id;
                $compraProducto->producte_id = $productoId;
                $compraProducto->Cantidad = $request->cantidad[$index];
                $compraProducto->save();

                // Add the purchased quantity to the product's stock
                $producto->Stock += $request->cantidad[$index];
                $producto->save();
            }
        }

        // Redirect to the index page with a success message
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

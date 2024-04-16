<?php

namespace App\Http\Controllers;

use App\Models\CompraProducto;
use Illuminate\Http\Request;
use App\Models\Compra;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vendedor;
use App\Models\Producte;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Cliente;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use App\Models\VentaPropuesta;
use App\Models\VentaPropuestaProducto;
class CompraProductoController extends Controller
{
    public function generateInvoiceAllBuy($vendedorId)
    {
         // Obtener todas las compras del vendedor
    $compras = Compra::where('vendedor_id', $vendedorId)->get();

    // Verificar si hay compras asociadas a este vendedor
    if ($compras->isEmpty()) {
        // Usar JavaScript para mostrar una alerta
        echo "<script>alert('No hay compras asociadas a este vendedor.');</script>";
        // Redirigir a la vista anterior
        echo "<script>window.history.back();</script>";
        return;
    }


    // Inicializar arrays para almacenar todos los productos y cantidades
    $items = [];
    $total = 0;

    // Iterar sobre todas las compras del vendedor
    foreach ($compras as $compra) {
        // Obtener todos los productos de esta compra
        $ventaProductos = CompraProducto::where('compra_id', $compra->id)->get();

        // Iterar sobre los productos de esta compra
        foreach ($ventaProductos as $ventaProducto) {
            $producto = $ventaProducto->producte; // Obtener el producto asociado al CompraProducto
            $items[] = (new InvoiceItem())
                ->title($producto->Nombre)
                ->pricePerUnit($producto->Precio)
                ->quantity($ventaProducto->Cantidad);

            // Calcular el total de la factura sumando el precio de cada producto
            $total += $producto->Precio * $ventaProducto->Cantidad;
        }
    }

    // Obtener la información del vendedor
    $vendedor = Vendedor::findOrFail($vendedorId);
    $clienteNombre = $vendedor->NombreVendedor;
    $clienteDireccion = $vendedor->Direccion;
    $clienteTelefono = $vendedor->Telefono;

    // Obtener la información del usuario autenticado
    $user = Auth::user();

    // Crear instancias de Buyer y Party
    $customer = new Buyer([
        'name' => $user->name,
        'custom_fields' => [
            'email' => $user->email,
        ],
    ]);

    $seller = new Party([
        'name' => $clienteNombre,
        'address' => $clienteDireccion,
        'phone' => $clienteTelefono,
    ]);

    // Crear la factura con todos los productos y la información del comprador y vendedor
    $invoice = Invoice::make()
        ->buyer($customer)
        ->seller($seller)
        ->taxRate(21)
        ->addItems($items)
        ->logo(public_path('Media/gazepa-removebg-preview.png'))
        ->totalAmount($total);

    // Devolver la factura
    return $invoice->stream();

    }


    public function generateInvoiceAllSell($clienteId)
    {
        // Obtener todas las ventas del vendedor
        $ventas = VentaPropuesta::where('cliente_id', $clienteId)->get();

        // Verificar si hay ventas asociadas a este vendedor
        if ($ventas->isEmpty()) {
            // Usar JavaScript para mostrar una alerta
            echo "<script>alert('No hay ventas asociadas a este vendedor.');</script>";
            // Redirigir a la vista anterior
            echo "<script>window.history.back();</script>";
            return;
        }

        // Inicializar arrays para almacenar todos los productos y cantidades
        $items = [];
        $total = 0;

        // Iterar sobre todas las ventas del vendedor
        foreach ($ventas as $venta) {
            // Obtener todos los productos de esta venta
            $ventaProductos = VentaPropuestaProducto::where('venta_propuesta_id', $venta->id)->get();

            // Iterar sobre los productos de esta venta
            foreach ($ventaProductos as $ventaProducto) {
                $producto = $ventaProducto->producte; // Obtener el producto asociado al VentaProducto
                $items[] = (new InvoiceItem())
                    ->title($producto->Nombre)
                    ->pricePerUnit($producto->Precio)
                    ->quantity($ventaProducto->CantidadVendida);

                // Calcular el total de la factura sumando el precio de cada producto
                $total += $producto->Precio * $ventaProducto->CantidadVendida;
            }
        }

        // Obtener la información del vendedor
        $vendedor = Cliente::findOrFail($clienteId);
        $clienteNombre = $vendedor->Nombre;
        $clientemail = $vendedor->Email;

        // Obtener la información del usuario autenticado
        $user = Auth::user();

        // Crear instancias de Buyer y Party
        $customer = new Buyer([
            'name'          => $clienteNombre,
            'custom_fields' => [
                'email' => $clientemail,
            ],
        ]);

        $seller = new Party([
            'name'          => $user->name,
            'address'       => 'Escola Pia Mataró',
            'code'          => '08302',
            'city'          => 'Mataró',
            'phone'         => '937 90 00 00',

            'custom_fields' => [
                'email' => $user->email,
            ],
        ]);

        // Crear la factura con todos los productos y la información del comprador y vendedor
        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($seller)
            ->taxRate(21)
            ->addItems($items)
            ->logo(public_path('Media/gazepa-removebg-preview.png'))
            ->totalAmount($total);

        // Devolver la factura
        return $invoice->stream();
    }


















    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        return view('budgets', compact('clientes', 'vendedores'));
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
    public function show(CompraProducto $compraProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompraProducto $compraProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompraProducto $compraProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompraProducto $compraProducto)
    {
        //
    }
}

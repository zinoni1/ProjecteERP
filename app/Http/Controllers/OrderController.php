<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Order;
use App\Models\Cliente;
use App\Models\Producte;
use App\Models\VentaPropuesta;
use App\Models\VentaPropuestaProducto;

class OrderController extends Controller
{
    public function generateInvoice(VentaPropuesta $id)
    {
        $venta = VentaPropuesta::where('id', $id)->with('cliente')->first();
        $clienteNombre = $venta->cliente->Nombre;

        $customer = new Buyer([
            'name'          => $clienteNombre,
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);

        $item = InvoiceItem::make('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }

}

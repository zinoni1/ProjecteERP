@extends('master')

@section('body')
<div class="navbar">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
</div>

<main>
    <div class="content">
        <section class="row mb-4">
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <p>prova</p>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <p>prova</p>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <p>Anàlisi data d'entrada</p>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <p>Detalls dels productes</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="row md-1">
            <div class="col md-1">
                <div class="card border-primary">
                    <div class="card-body">
                        <h3>Ventes</h3>
                        <div class="overflow-auto" style="max-height: 600px;">
                        <table class="table">
    <thead>
        <tr>
            <th>Client</th>
            <th>Producte</th>
            <th>Estat</th>
            <th>Detalls</th>
            <th>Preu Unitari</th>
            <th>Cantitat Venuda</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ventes as $venta)
    @foreach($venta->productes as $producto)
        <tr>
            <!-- Mostrar el nombre del cliente -->
            <td>{{ $venta->cliente->Nombre }}</td>
            <td>{{ $producto->Nombre }}</td>

            @if($venta->Estado == 'Rechazada')
                <td class="stock-low">{{ $venta->Estado }}</td>
            @elseif($venta->Estado == 'Pendiente')
                <td class="stock-medium">{{ $venta->Estado }}</td>
            @elseif($venta->Estado == 'Aceptada')
                <td class="stock-high">{{ $venta->Estado }}</td>
            @endif

            <td>{{ $venta->Detalles }}</td>

            @php
                $detalleVentaProducto = App\Models\VentaDetalle::where('VentaPropuestaID', $venta->id)
                    ->where('ProductoServicioID', $producto->id)
                    ->first();
            @endphp

            @if($detalleVentaProducto)
                <td>{{ $detalleVentaProducto->PrecioUnitario }}</td>
                <td>{{ $detalleVentaProducto->CantidadVendida }}</td>
            @else
                <td>-</td>
                <td>-</td>
            @endif
        </tr>
    @endforeach
@endforeach

    </tbody>
</table>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<style>
    /* Estilos para los colores de fondo según el estado */
    .stock-low {
        background-color: #FF8080 !important; /* Rojo */
    }

    .stock-medium {
        background-color: #FFFF69 !important; /* Amarillo */
    }

    .stock-high {
        background-color: #90EE90 !important; /* Verde */
    }
</style>

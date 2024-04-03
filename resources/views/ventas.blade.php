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
                    <button class="btn"><a href="{{ route('ventas.create') }}" style="backgroud-color: blue;">Crear proposta</a></button>
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
                        <h3>Propostes</h3>
                        <div class="overflow-auto" style="max-height: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Estat</th>
                                        <th>Detalls</th>
                                        <th>Preu Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($ventes as $venta)
    @php
        $totalPrecio = 0;
    @endphp

    @foreach($venta->productes as $producto)
    @php
            $ventaProducto = $ventaProductos->where('producte_id', $producto->id)->first();
            $cantidadVendida =  $ventaProducto->CantidadVendida;
        $totalPrecio += $producto->Precio * $cantidadVendida;
        @endphp

    @endforeach

    <tr class="tr" id="row_{{ $venta->id }}" onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">
        <td>{{ $venta->cliente->Nombre }}</td>

        @if($venta->Estado == 'Rechazada')
            <td class="stock-low">{{ $venta->Estado }}</td>
        @elseif($venta->Estado == 'Pendiente')
            <td class="stock-medium">{{ $venta->Estado }}</td>
        @elseif($venta->Estado == 'Aceptada')
            <td class="stock-high">{{ $venta->Estado }}</td>
        @endif

        <td>{{ $venta->Detalles }}</td>

        <!-- Mostrar el precio solo si hay productos asociados -->

        @if(count($venta->productes) > 0)
            <td>{{ $totalPrecio }}</td>
        @else
            <td>Sense preu</td>
        @endif
    </tr>
@endforeach




<!-- Imprimir el total al final de la tabla -->

     <!-- Mostrar el total del precio -->


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
    .stock-low {
        background-color: #FF8080 !important; /* Rojo */
    }

    .stock-medium {
        background-color: #FFFF69 !important; /* Amarillo */
    }

    .stock-high {
        background-color: #90EE90 !important; /* Verde */
    }
    .tr:hover {
        background-color: #f5f5f5 !important;
    }
</style>

<script>
    function redirectToRoute(route) {
        window.location.href = route;
    }
</script>

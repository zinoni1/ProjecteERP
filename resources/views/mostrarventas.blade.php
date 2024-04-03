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
                    <button class="btn"><a href="{{ route('productes.create') }}" style="color: blue;"></a></button>
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
                                        <th>Nom producte</th>
                                        <th>Cantidad</th>
                                        <th>Preu unitari</th>
                                        <th>Preu Total</th>
                                    </tr>
                                </thead>
                                <tbody>

@php
    $total = 0;
@endphp
                                @foreach($venta->productes as $producto)
    <tr id="row_{{ $producto->id }}">
        <td>{{ $producto->Nombre }}</td>

        <!-- Buscar la cantidad vendida del producto actual en $ventaProductos -->
        @php
            $ventaProducto = $ventaProductos->where('producte_id', $producto->id)->first();
            $cantidadVendida = $ventaProducto ? $ventaProducto->CantidadVendida : 0;
        @endphp

        <td>{{ $cantidadVendida }}</td>
            <td >{{ $producto->Precio }}</td>


        <!-- Calcular el precio total utilizando la cantidad vendida del producto -->
        <td>{{ $producto->Precio * $cantidadVendida }}</td>
        @php
            $total += $producto->Precio * $cantidadVendida;
        @endphp

    </tr>
@endforeach
<tr>
    <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
    <td><strong>{{$total}}</strong></td>
</tr>



<!-- Imprimir el total al final de la tabla -->

     <!-- Mostrar el total del precio -->


                                </tbody>
                            </table>
<button class="btn btn-primary">Imprimir factura</button>
<button class="btn btn-success">Imprimir albaran</button>

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

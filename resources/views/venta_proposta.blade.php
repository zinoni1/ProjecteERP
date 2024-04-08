@extends('master')

@section('content')
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
                        <h3>Productes de la proposta {{$venta->id}} del client {{$venta->cliente->Nombre}}</h3>
                        <div class="overflow-auto" style="max-height: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producte</th>
                                        <th>Quantitat</th>
                                        <th>Stock</th>
                                        <th>Preu Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                       @foreach($venta->productes as $producto)
    @php
        $ventaProducto = $ventaProductos->where('producte_id', $producto->id)->first();
        $cantidadVendida = $ventaProducto ? $ventaProducto->CantidadVendida : 0;
    @endphp
    <tr id="row_{{ $producto->id }}">
        <td>{{ $producto->Nombre }}</td>
        <td>{{ $cantidadVendida }}</td>
        <td>{{ $producto->Stock }}</td>
        <td>{{ $producto->Precio * $cantidadVendida }}</td>
    </tr>
@endforeach

                                </tbody>
                            </table>
                            @if($venta->Estado == 'Aceptada')
    <button class="btn btn-primary" onclick="window.location='{{ route('mostrarventas', ['id' => $venta->id]) }}'">Veure venta</button>
@endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

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
</style>

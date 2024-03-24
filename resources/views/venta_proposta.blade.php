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
                        <h3>Productes de la proposta {{$venta->id}} del client {{$venta->cliente->Nombre}}</h3>
                        <div class="overflow-auto" style="max-height: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Producte</th>
                                        <th>Stock</th>
                                        <th>Preu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($venta->productes as $producto)
                                        <tr id="row_{{ $producto->id }}">
                                            <td>{{$producto->id}}</td>
                                                <td>{{ $producto->Nombre }}</td>

                                                <td>{{ $producto->Stock }}</td>
            @if($producto->Precio <= 10)
                <td class="stock-low">{{ $producto->Precio }}</td>
            @elseif($producto->Precio >10 && $producto->Precio <= 50)
                <td class="stock-medium">{{ $producto->Precio }}</td>
            @elseif($producto->Precio >= 50)
                <td class="stock-high">{{ $producto->Precio }}</td>
            @endif
                                            </tr>
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

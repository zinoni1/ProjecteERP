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
                        <a href="crearProducte" style="color: blue;">Crear Productes/Serveis</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <a href="{{ route('mostrarProductos') }}" class="btn btn-primary">Mostrar Productos/Serveis</a>
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
                        <h3>Llista de Productos</h3>
                        <div class="overflow-auto" style="max-height: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Categoria</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Fecha de Entrada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos->sortByDesc('created_at')->take(10) as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>{{ $producto->Descripcion }}</td>
                                        <td>{{ $producto->Categoria }}</td>
                                        <td>{{ $producto->Precio }}</td>
                                        <!-- Aplicar clases según el stock -->
                                        <td class="{{ $producto->Stock <= 10 ? 'stock-low' : ($producto->Stock <= 50 ? 'stock-medium' : '') }}"
                                            title="{{ $producto->Stock <= 10 ? 'Alerta: Stock menor a 10' : ($producto->Stock <= 50 ? 'Alerta: Stock menor a 50' : '') }}">
                                            {{ $producto->Stock }}
                                        </td>
                                        <td>{{ $producto->FechaEntrada }}</td>
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
    /* Estilos para los colores de fondo según el stock */
    .stock-low {
        background-color: #FF8080 !important;
    }

    .stock-medium {
        background-color: #FFFF69 !important;
    }
</style>

@extends('master')

<style>
    /* Estilo para el contenido principal */
    .content-container {
        padding: 20px;
    }

    body {
        font-family: Arial, sans-serif;
        margin-left: 0px;
        transition: margin-left 0.5s;
        background-color: white !important;
    }

    .menu-container {
        height: 100%; /* Set height to 100% of the viewport height */
        background-color: #f8f9fa; /* Set background color as needed */
        padding: 20px; /* Adjust padding as needed */
        max-height: 700px; /* Max height for menu container */
        overflow-y: auto; /* Add vertical scroll if content exceeds max height */
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #115571 !important;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #115571 !important;
        color: black;
        padding: 10px 15px;
        border: none;
    }

    .navbar {
        background-color: #115571 !important;
        overflow: hidden;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-table th,
    .product-table td {
        border: 1px solid #dee2e6;
        padding: 8px;
        text-align: left;
    }

    .product-table th {
        background-color: #007bff;
        color: #fff;
    }

    .product-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .product-table tbody tr:hover {
        background-color: #e2e6ea;
    }

    /* Estilos para los colores de fondo según el stock */
    .stock-low {
        background-color: #FF8080 !important;
    }

    .stock-medium {
        background-color: #FFFF69 !important;
    }

    /* Estilo para el filtro */
    .filter-container {
        margin-top: 20px;
    }

    .filter-container label,
    .filter-container select,
    .filter-container button {
        display: inline-block;
        margin-right: 10px;
    }

    .filter-container button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
    }

    .filter-container button:hover {
        background-color: #0056b3;
    }
</style>

@section('body')
<div class="navbar">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
</div>

<main>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
    <a href="{{ route('products') }}" class="btn btn-secondary mt-3">Volver</a>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-block mt-3">Crear Categoria</a>

</div>
            <div style="text-align: right;" class="col-md-6 text-right filter-container">
                <form action="{{ route('mostrarProductos') }}" method="GET">
                    <label for="order">Ordenar per:</label>
                    <select name="order" id="order">
                    <option value="all">Creació</option>
                <option value="asc">Stock Asc.</option>
                <option value="desc">Stock Desc.</option>
                <option value="less_than_10">10 o menys</option>
                <option value="between_10_and_50">Entre 10 i 50</option>
                    </select>
                    <button type="submit">Ordenar</button>
                </form>
            </div>
        </div>
        
        <!-- Leyenda -->
        <div class="row mb-3">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <span class="badge badge-pill badge-danger">Stock &lt; 10</span>
                <span class="badge badge-pill badge-warning">10 &le; Stock &lt; 50</span>
            </div>
        </div>

        <div class="row">
            <!-- Menú a la izquierda -->
            <div class="col-md-2 menu-container">
    <h3>Categories</h3>
    <ul class="list-group">
        @foreach($categorias as $categoria)
        <li class="list-group-item menu-item"><a href="{{ route('categorias.show', $categoria->id) }}">{{ $categoria->Categoria }}</a></li>
        @endforeach
    </ul>
</div>


            <div class="col-md-10 content-container">
                <h1>Llista de Productes</h1>
                <div class="overflow-auto" style="max-height: 600px;">
                    <table class="product-table">
                        <thead>
                            <tr>
                            <th>Nom</th>
                            <th>Descripció</th>
                            <th>Categoria</th>
                            <th>Preu</th>
                            <th>Stock</th>
                            <th>Data d'entrada</th>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
<tr onclick="window.location='{{ route('productes.show', $producto) }}';" style="cursor:pointer;">
    <td>{{ $producto->Nombre }}</td>
    <td>{{ $producto->Descripcion }}</td>
    <!-- Itera sobre las categorías y encuentra la correspondiente para este producto -->
    <td>
                                         @if($producto->categoria)
                                         {{ $producto->categoria->Categoria }}
                                             @else
                                               Sin categoría
                                             @endif
                                        </td>
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
</main>

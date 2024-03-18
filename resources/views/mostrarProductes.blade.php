@extends('master')
<style>

        /* Estilo para el contenido principal */
        .content-container {
            padding: 20px;
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
    </style>
@section('body')
<main>
<div class="navbar">
        <button class="openbtn" onclick="openNav()">☰ Menú</button>
    </div>
<main>
<div class="container-fluid">
<a href="{{ route('products') }}" class="btn btn-secondary mt-3">Volver</a>

    <div class="row">
        <!-- Menú a la izquierda -->
        <div class="col-md-2 menu-container">
            <h3>Menú</h3>
            <!-- Aquí puedes agregar tus elementos de menú -->
            <ul class="list-group">
                <li class="list-group-item menu-item"><a href="#">Elemento de menú 1</a></li>
                <li class="list-group-item menu-item"><a href="#">Elemento de menú 2</a></li>
                <li class="list-group-item menu-item"><a href="#">Elemento de menú 3</a></li>
            </ul>
        </div>
        <!-- Contenido principal -->
        <div class="col-md-10 content-container">
            <h1>Listado de Productos</h1>
            <div class="overflow-auto" style="max-height: 1000px;">
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Fecha de Entrada</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productos as $producto)
<tr onclick="window.location='{{ route('productes.show', $producto) }}';" style="cursor:pointer;">
    <td>{{ $producto->id }}</td>
    <td>{{ $producto->nombre }}</td>
    <td>{{ $producto->Descripcion }}</td>
    <td>{{ $producto->Precio }}</td>
    <td>{{ $producto->Stock }}</td>
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
@extends('master')

@section('body')
    <!-- Agrega tu estilo aquí si es necesario -->
@endsection

@section('content')
    <h1>Listado de Productos</h1>

    <div class="overflow-auto" style="max-height: 1000px;">
        <table>
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

                    <tr>
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
@endsection

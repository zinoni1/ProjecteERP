@extends('master')

@section('content')
    <div class="container">
        <h1>Lista de Compras</h1>
        <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3">Crear Compra</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Compra</th>
                    <th>Cantidad</th>
                    <th>Usuario</th>
                    <th>Vendedor</th>
                    <th>Producto</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->FechaCompra }}</td>
                    <td>{{ $compra->Cantidad }}</td>
                    <td>
                        @isset($compra->user)
                            {{ $compra->user->name }}
                        @else
                            Usuario no disponible
                        @endisset
                    </td>
                    <td>{{ $compra->vendedor->NombreVendedor }}</td>
                    <td>{{ $compra->producte->Nombre }}</td>
                    <td>{{ $compra->Cantidad * $compra->producte->Precio}}€</td> <!-- Cálculo del precio total -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

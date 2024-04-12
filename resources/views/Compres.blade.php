@extends('master')

@section('content')
    <div class="container">
        <h1>Lista de Compras</h1>
        <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3">Crear Compra</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Compra</th>
                    <th>Usuario</th>
                    <th>Vendedor</th>

                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                <tr onclick="window.location='{{ route('compras.show', $compra->id) }}';" style="cursor: pointer;">
                    <td>{{ $compra->FechaCompra }}</td>
                    <td>
                        @isset($compra->user)
                            {{ $compra->user->name }}
                        @else
                            Usuario no disponible
                        @endisset
                    </td>
                    <td>{{ $compra->vendedor->NombreVendedor }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

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
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Añadir Cliente</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <a href="{{ route('mostrarClientes') }}" class="btn btn-primary">Mostrar todos los clientes</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <a href="{{ route('graficPoblacio') }}" class="btn btn-primary">Estadisticas Poblacion</a>
                    </div>
                </div>
            </div>
        </section>
        </div>
        <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de Clientes') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Población</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes->take(10) as $cliente)
                                <td>{{ $cliente->Nombre }}</td>
                                <td>{{ $cliente->Apellido }}</td>
                                <td>{{ $cliente->Email }}</td>
                                <td>{{ $cliente->Telefono }}</td>
                                <td>{{ $cliente->Direccion }}</td>
                                <td>{{ $cliente->Poblacion }}</td>
                                <td>
                                    <form id="delete-form-{{ $cliente->id }}" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmarEliminar('{{ $cliente->id }}')">Eliminar</button>
                                    </form>
                                    <form action="{{ route('clientes.show', $cliente->id) }}" method="GET" style="display: inline;">
                                        <button type="submit" class="btn btn-primary">Ver</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($clientes->count() >= 10)
                    <div class="text-center">
                        <a href="{{ route('mostrarClientes') }}" class="btn btn-primary">Mostrar Todos</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmarEliminar(id) {
        if (confirm('¿Estás seguro de que quieres eliminar este cliente?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
</main>

@extends('master')

@section('content')
<div class="content">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="card border-secondary">
                <div class="card-body">
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">{{ __('traduccion.afegirclient') }}</a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('traduccion.llistaclients') }}</div>

                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col">{{ __('traduccion.nom') }}</th>
                                    <th scope="col">{{ __('traduccion.cognom') }}</th>
                                    <th scope="col">{{ __('traduccion.correu') }}</th>
                                    <th scope="col">{{ __('traduccion.telefon') }}</th>
                                    <th scope="col">{{ __('traduccion.adreca') }}</th>
                                    <th scope="col">{{ __('traduccion.poblacio') }}</th>
                                    <th scope="col">{{ __('traduccion.accions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes->take(10) as $cliente)
                                    <tr>
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
                                                <button type="button" class="btn btn-danger" onclick="confirmarEliminar('{{ $cliente->id }}')">{{ __('traduccion.eliminar') }}</button>
                                            </form>
                                            <form action="{{ route('clientes.show', $cliente->id) }}" method="GET" style="display: inline;">
                                                <button type="submit" class="btn btn-primary">{{ __('traduccion.editar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($clientes->count() >= 10)
                    <div class="text-center">
                        <a href="{{ route('mostrarClientes') }}" class="btn btn-primary">{{ __('traduccion.mostrartotsclient') }}</a>
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
@endsection

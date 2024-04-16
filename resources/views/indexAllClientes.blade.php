@extends('master')

@section('content')
<div class="content">
    <section class="row mb-2">
        <div class="col-6 text-center">
            <div class="card border-secondary">
                <div class="card-body">
                    <a href="{{ route('clientes.create') }}"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ __('traduccion.afegirclient') }}</a>
                </div>
            </div>
        </div>

        <div class="col-6 text-center">
            <div class="card border-secondary">
                <div class="card-body">
                    <a href="{{ route('graficPoblacio') }}"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ __('traduccion.estadisticaspoblacion') }}</a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.nom') }}</th>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.cognom') }}</th>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.correu') }}</th>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.telefon') }}</th>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.adreca') }}</th>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.poblacio') }}</th>
                            <th scope="col" class="px-6 py-4 text-left">{{ __('traduccion.accions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr class="bg-white">
                            <td class="px-6 py-4">{{ $cliente->Nombre }}</td>
                            <td class="px-6 py-4">{{ $cliente->Apellido }}</td>
                            <td class="px-6 py-4">{{ $cliente->Email }}</td>
                            <td class="px-6 py-4">{{ $cliente->Telefono }}</td>
                            <td class="px-6 py-4">{{ $cliente->Direccion }}</td>
                            <td class="px-6 py-4">{{ $cliente->Poblacion }}</td>
                            <td class="px-6 py-4">
                                <form id="delete-form-{{ $cliente->id }}" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" onclick="confirmarEliminar('{{ $cliente->id }}')">{{ __('traduccion.eliminar') }}</button>
                                </form>
                                <form action="{{ route('clientes.show', $cliente->id) }}" method="GET" style="display: inline;">
                                    <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ __('traduccion.editar') }}</button>
                                </form>
                            </td>
                        </tr><tr class="border-t border-gray-200 dark:border-gray-600"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $clientes->links() }}
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

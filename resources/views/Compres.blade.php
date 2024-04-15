@extends('master')

@section('content')
<section class="row mb-4">
    <div class="col-3 text-center">
        <div class="card border-secondary">
            <div class="card-body">
            <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3">{{ __('Compras.create_purchase') }}</a>
            </div>
        </div>
    </div>
    <div class="col-3 text-center">
        <div class="card border-secondary">
            <div class="card-body">
                <p>{{ __('Compras.prova') }}</p>
            </div>
        </div>
    </div>
    <div class="col-3 text-center">
        <div class="card border-secondary">
            <div class="card-body">
                <p>{{ __('Compras.analisi_data_entrada') }}</p>
            </div>
        </div>
    </div>
    <div class="col-3 text-center">
        <div class="card border-secondary">
            <div class="card-body">
                <p>{{ __('Compras.detalls_productes') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <h1>{{ __('Compras.lista_compras') }}</h1>
                <a href="{{ route('compras.create') }}" class="btn btn-primary mb-3">{{ __('Compras.crear_compra') }}</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">{{ __('Compras.fecha_compra') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Compras.usuario') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('Compras.vendedor') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                        <tr onclick="window.location='{{ route('compras.show', $compra->id) }}';" style="cursor: pointer;"
                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $compra->FechaCompra }}</td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @isset($compra->user)
                                {{ $compra->user->name }}
                                @else
                                {{ __('Compras.usuario_no_disponible') }}
                                @endisset
                            </td>
                            <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $compra->vendedor->NombreVendedor }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Enlaces de paginación -->
<div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
    <div class="mt-4">
        {{ $compras->links() }}
    </div>
</div>
@endsection

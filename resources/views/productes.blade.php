@extends('master')

@section('content')

    <div class="content">
        <section class="row mb-4">
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <a href="{{ route('productes.create') }}" style="color: blue;">{{ __('productes.Crear Productes/Serveis') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <a href="{{ route('mostrarProductos') }}" class="btn btn-primary">{{ __('productes.Mostrar Productos/Serveis') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <a href="{{ route('productes.graficoProductos') }}" class="btn btn-primary">{{ __('productes.GraficaProductos/Serveis') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <p>{{ __('productes.detalls_productes') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="row md-1">
            <div class="col md-1">
                <div class="card border-primary">
                    <div class="card-body">
                        <h3>{{ __('productes.lista_compras') }}</h3>
                        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400 border border-gray-300 bg-gray-200"> <!-- Agregué border y bg-gray-200 -->
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4"></th>
                        <th scope="col" class="px-4 py-3">{{ __('productes.Nom') }}</th>
                        <th scope="col" class="px-4 py-3">{{ __('productes.Descripcio') }}</th>
                        <th scope="col" class="px-4 py-3">{{ __('productes.Categoria') }}</th>
                        <th scope="col" class="px-4 py-3">{{ __('productes.Preu') }}</th>
                        <th scope="col" class="px-4 py-3">{{ __('productes.Stock') }}</th>
                        <th scope="col" class="px-4 py-3">{{ __('productes.Data d\'entrada') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos->sortByDesc('created_at')->take(10) as $producto)
                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="w-4 px-4 py-3">
                            <div class="flex items-center">
                                <!-- Aquí puedes agregar tu lógica de checkbox si es necesario -->
                            </div>
                        </td>
                        <td scope="row" class="flex items-center px-4 py-2 font-medium whitespace-nowrap"> <!-- Quité text-gray-500 aquí -->
                            <!-- Aquí puedes agregar cualquier contenido o lógica necesaria -->
                            {{ $producto->Nombre }}
                        </td>
                        <td class="px-4 py-2">{{ $producto->Descripcion }}</td>
                        <td class="px-4 py-2">
                            @if($producto->categoria)
                            {{ $producto->categoria->Categoria }}
                            @else
                            {{ __('productes.Sin categoría') }}
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $producto->Precio }}</td>
                        <td class="{{ $producto->Stock <= 10 ? 'bg-red-500' : ($producto->Stock <= 50 ? 'bg-yellow-500' : '') }} px-4 py-2"
                            title="{{ $producto->Stock <= 10 ? __('Alerta: Stock menor a 10') : ($producto->Stock <= 50 ? __('Alerta: Stock menor a 50') : '') }}">
                            {{ $producto->Stock }}
                        </td>
                        <td class="px-4 py-2">{{ $producto->FechaEntrada }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

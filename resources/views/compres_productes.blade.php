@extends('master')

@section('content')
<section class="row mb-4">
    <div class="col-3 text-center">
        <div class="card border-secondary">
            <div class="card-body">
                <button class="btn"><a href="{{ route('compras.create') }}" style="color: blue;">{{ __('Compras.crear_compra') }}</a></button>
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
                <div class="flex items-center flex-1 space-x-4">
                    <h5>
                        <span class="dark:text-black">{{ __('Compras.prdocuts_of_proposal') }} {{$compra->id}} {{ __('Compras.of_customer') }} {{$compra->user->name}}</span>
                    </h5>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">{{ __('ventas.product') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('ventas.stock') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('ventas.quantity') }}</th>
                            <th scope="col" class="px-4 py-3">{{ __('ventas.total_price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compraProductos as $compraProducto)
                            @php
                                $producto = $compraProducto->producte;
                                $cantidadComprada = $compraProducto->Cantidad;
                            @endphp
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ $producto->ruta }}" alt="img" class="w-auto h-8 mr-3">
                                    {{ $producto->Nombre }}
                                </th>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        <div class="inline-block w-4 h-4 mr-2
                                            @if($producto->Stock < 10)
                                                bg-red-700
                                            @elseif($producto->Stock >= 10 && $producto->Stock <= 50)
                                                bg-yellow-500
                                            @else
                                                bg-green-500
                                            @endif
                                            rounded-full"></div>
                                        {{ $producto->Stock }}
                                    </div>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $cantidadComprada }}</td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 text-gray-400" aria-hidden="true">
                                            <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                        </svg>
                                        {{ $producto->Precio * $cantidadComprada }}€
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                @if($compra->Estado == 'Aceptada')
                    <button class="btn btn-primary" onclick="window.location='{{ route('mostrarventas', ['id' => $compra->id]) }}'">{{ __('ventas.view_sell') }}</button>
                @endif
            </nav>
        </div>
    </div>
</section>
@endsection

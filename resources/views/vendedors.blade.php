@extends('master')

@section('content')
<div class="content">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex items-center flex-1 space-x-4">
                        <a href="{{ route('venedors.create') }}" class="btn btn-primary">{{ __('vendedor.create seller') }}</a>

                            <h5>
                                <span class="dark:text-black">{{ __('vendedor.seller list') }}</span>
                            </h5>
                        </div>
                    </div>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __('vendedor.name') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('vendedor.direction') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('vendedor.phone') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendedores as $vendedor)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $vendedor->NombreVendedor }}</td>
                                <td class="px-6 py-4">{{ $vendedor->Direccion }}</td>
                                <td class="px-6 py-4">{{ $vendedor->Telefono }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

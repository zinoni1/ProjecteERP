@extends('master')

@section('content')
<div class="content">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex items-center flex-1 space-x-4">
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
                        @foreach ($vendedores as $index => $vendedor)
                        <tr class="custom-row" target="_blank" onclick="window.location='{{ route('orders.generateInvoiceAllBuy', $vendedor->id) }}';">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ $vendedor->NombreVendedor }}&color=7F9CF5&background=EBF4FF" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $vendedor->NombreVendedor }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-gray-200">{{ $vendedor->Direccion }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $vendedor->Telefono }}
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 dark:border-gray-600"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex items-center flex-1 space-x-4">
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
                        @foreach ($clientes as $index => $cliente)
                        <tr class="custom-row" onclick="window.location='{{ route('orders.generateInvoiceAllSell', $cliente->id) }}';">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items
                                -center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ $cliente->Nombre }}&color=7F9CF5&background=EBF4FF" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                            {{ $cliente->Nombre }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-gray-200">{{ $cliente->Direccion }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $cliente->Telefono }}
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 dark:border-gray-600"></tr>
                        @endforeach


                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
<style>
    .custom-row {
    background-color: #ffffff; /* Color de fondo */
}

.custom-row:hover {
    background-color: #e5e5e5; /* Color de fondo al pasar el ratón */
}

</style>

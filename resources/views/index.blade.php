@extends('master')

@section('content')

<section class="px-4 mx-auto max-w-screen-xl lg:px-8 mt-8">
<h2 class="text-3xl font-semibold text-white dark:text-gray-200">Benvingut a Gazepa, {{$user->name}}👋</h1> <!-- Cambio de color de texto a blanco y centrado -->
    <div class="grid grid-cols-2 gap-8">
        <div class="bg-white p-6 shadow-md rounded-lg"style="max-height: 300px; overflow-y: auto; max-width: 800px;">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('perfil.lastBuy') }}</h2>

            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('Compras.fecha_compra') }}</th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('Compras.usuario') }}</th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('Compras.vendedor') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($ultimasCompras as $compra)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                        <td class="px-4 py-2 whitespace-nowrap">{{ $compra->FechaCompra }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $compra->user->name }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $compra->vendedor->NombreVendedor }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('perfil.lastSell') }}</h2>

                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('ventas.customer') }}</th>
                        <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('ventas.status') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($ultimasVentas as $venta)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                        <td class="px-4 py-2 whitespace-nowrap">{{ $venta->cliente->Nombre }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ $venta->Estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 shadow-md rounded-lg" style="max-height: 400px; overflow-y: hidden; max-width: 800px;">
    <div class="flex justify-center items-center mb-6">
        <div class="w-2/3">
            <h1 class="text-2xl font-semibold mb-2">{{ __('index.comparacio') }}</h1>
            <p class="text-gray-600">{{ __('index.porcentaje') }}</p>
        </div>
        <div class="w-1/3">
            <div class="relative" style="height: 210px; width: 210x;">
                <canvas id="myChart" width="210" height="210"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between">
            <div class="flex items-center">
                <div class="w-4 h-4 bg-red-500 mr-2"></div>
                <p class="text-sm font-semibold">{{ __('index.ventas') }}</p>
            </div>
            <p class="text-sm">{{ $totalVentas }} euros</p>
        </div>
        <div class="flex justify-between mt-2">
            <div class="flex items-center">
                <div class="w-4 h-4 bg-blue-500 mr-2"></div>
                <p class="text-sm font-semibold">{{ __('index.compras') }}</p>
            </div>
            <p class="text-sm">{{ $totalCompras }} euros</p>
        </div>
        <div class="flex justify-between mt-2">
            <div class="flex items-center">
                <div class="w-4 h-4 mr-2 {{ $balance >= 0 ? 'bg-green-500' : 'bg-red-500' }}"></div>
                <p class="text-sm font-semibold">{{ $balance >= 0 ? __('index.balancePositivo') : __('index.balanceNegativo') }}</p>
            </div>
            <p class="text-sm">{{ abs($balance) }} euros</p>
        </div>
    </div>
</div>

<div class="bg-white p-6 shadow-md rounded-lg"style="max-height: 500px; overflow-y: auto; max-width: 800px;">
                    <div class="px-6 py-4 bg-gray-200 dark:bg-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('perfil.lastusers') }}</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('perfil.name') }}</th>
                                    <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('perfil.email') }}</th>
                                    <th class="px-4 py-2 text-xs font-semibold tracking-wider uppercase">{{ __('perfil.role') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $user->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $user->email }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $user->role }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
         </div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                "{{ __('index.ventas') }}", 
                "{{ __('index.compras') }}"
            ],
            datasets: [{
                label: "{{ __('index.comparacio') }}",
                data: [{{ $porcentajeVentas }}, {{ $porcentajeCompras }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: 'rgb(255, 99, 132)'
                    }
                },
                afterDraw: (chart) => {
                    const ctx = chart.ctx;
                    const canvas = chart.canvas;
                    const balanceText = "{{ $balance >= 0 ? __('index.balancePositivo') : __('index.balanceNegativo') }}";
                    const centerX = canvas.width / 2;
                    const centerY = canvas.height / 2;
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.font = '16px Arial';
                    ctx.fillStyle = "{{ $balance >= 0 ? 'green' : 'red' }}";
                    ctx.fillText(balanceText, centerX, centerY);
                }
            }
        }
    });
</script>

@endsection

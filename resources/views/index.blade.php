@extends('master')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-lg lg:px-8">
        <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
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

<div class="flex justify-center items-center mt-8">
    <div class="max-w-md w-full">
        <div class="bg-white p-6 shadow-md rounded-lg">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-semibold mb-2">{{ __('index.comparacio') }}</h1>
                <p class="text-gray-600">{{ __('index.porcentaje') }}</p>
            </div>

            <div class="relative">
                <canvas id="myChart" width="400" height="400"></canvas>
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
    </div>
</div>

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
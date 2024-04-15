@extends('master')

@section('content')
<div style="background-color: white; padding: 20px;">
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos por Rango de Stock</title>
        <!-- Include the Chart.js library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            canvas {
                max-width: 100%; /* Ajusta el tamaño máximo del lienzo */
                margin: 0 auto; /* Centra el lienzo horizontalmente */
                display: block; /* Hace que el lienzo sea un bloque para alinearlo correctamente */
            }
            body {
                color: black; /* Color del texto en negro */
            }
        </style>
    </head>
    <body>
        <canvas id="productosChart" width="800" height="700"></canvas>

        <script>
            // Obtener los datos pasados desde el controlador
            var labels = <?php echo json_encode($labels); ?>;
            var data = <?php echo json_encode($data); ?>;

            // Crear el gráfico
            var ctx = document.getElementById('productosChart').getContext('2d');
            var productosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de Productos',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', // Rojo para "Menos de 10"
                            'rgba(54, 162, 235, 0.2)', // Azul para "Entre 10 y 50"
                            'rgba(255, 206, 86, 0.2)' // Amarillo para "Más de 50"
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'black' // Color del texto en negro
                            }
                        },
                        x: {
                            ticks: {
                                color: 'black' // Color del texto en negro
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: 'black' // Color del texto en negro
                            }
                        }
                    }
                }
            });
        </script>
    </body>
    </html>
</div>
@endsection

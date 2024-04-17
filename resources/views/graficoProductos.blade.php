@extends('master')

@section('content')
<div style="background-color: white; padding: 20px;">
    <canvas id="productosChart" width="600" height="300"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    label: '{{ __('productes.quantitat') }}',
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
                        display: true,
                        labels: {
                            color: 'black', // Color del texto en negro
                            generateLabels: function(chart) {
                                var data = chart.data;
                                if (data.labels.length && data.datasets.length) {
                                    return data.labels.map(function(label, i) {
                                        var meta = chart.getDatasetMeta(0);
                                        var ds = data.datasets[0];
                                        var value = ds.data[i];
                                        var backgroundColor = ds.backgroundColor[i];
                                        var borderColor = ds.borderColor[i];
                                        var labelColor = this.options.labels.color;
                                        return {
                                            text: label + ': ' + value, // Personaliza el texto de la leyenda
                                            fillStyle: labelColor,
                                            hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                                            lineCap: 'round',
                                            strokeStyle: borderColor,
                                            lineWidth: 2,
                                            pointStyle: 'line',
                                            backgroundColor: backgroundColor,
                                            borderColor: borderColor,
                                            borderWidth: 1
                                        };
                                    }, this);
                                }
                                return [];
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>
@endsection

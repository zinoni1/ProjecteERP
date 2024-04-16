@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Estadistíques de l'estat de propostes</div>

                <div class="card-body">
                    <canvas id="chartEstat" width="1000" height="500"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Obtener los datos desde PHP
    var labels = <?php echo json_encode($labels); ?>;
    var data = <?php echo json_encode($data); ?>;

    // Definir los colores dependiendo del estado
    var colors = [];

    labels.forEach(function(label) {
        if (label === 'Rechazada') {
            colors.push('rgba(255, 99, 132, 0.5)'); // Color para Rechazada
        } else if (label === 'Aceptada') {
            colors.push('rgba(75, 192, 192, 0.5)'); // Color para Aceptada
        } else if (label === 'Pendiente') {
            colors.push('rgba(255, 206, 86, 0.5)'); // Color para Pendiente
        } else {
            colors.push('rgba(54, 162, 235, 0.5)'); // Color predeterminado
        }
    });

    // Organizar los datos por estado
    var datasets = labels.map(function(label, index) {
        return {
            label: label,
            data: [data[index]], // Solo un valor para cada estado
            backgroundColor: colors[index],
            borderColor: colors[index],
            borderWidth: 1
        };
    });

    // Crear el gráfico
    var ctx = document.getElementById('chartEstat').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [''], // Etiqueta vacía para asegurar que las barras estén separadas
            datasets: datasets
        },
        options: {
            responsive: false, // Desactiva la respuesta para mantener el tamaño fijo
            maintainAspectRatio: false, // Desactiva el mantenimiento del aspecto para permitir el cambio de tamaño
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Quantitat de propostes',
                        fontSize: 18 // Tamaño de fuente personalizado para el título del eje y
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Estat',
                        fontSize: 18 // Tamaño de fuente personalizado para el título del eje x
                    }
                }
            }
        }
    });
</script>
@endsection

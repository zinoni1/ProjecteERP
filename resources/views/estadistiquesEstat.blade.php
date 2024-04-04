@extends('master')

@section('body')
<div class="navbar">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
</div>
<main>
<div class="content">
<section class="row mb-4">
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </section>
        </div>
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

    labels.forEach(function(label, index) {
        console.log(label, index);
        if (label === 'Rechazada') {
            colors.push({
                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Color para Rechazada
                borderColor: 'rgba(255, 99, 132, 1)'
            });
        } else if (label === 'Aceptada') {
            colors.push({
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Color para Aceptada
                borderColor: 'rgba(75, 192, 192, 1)'
            });
        } else if (label === 'Pendiente') {
            colors.push({
                backgroundColor: 'rgba(255, 206, 86, 0.5)', // Color para Pendiente
                borderColor: 'rgba(255, 206, 86, 1)'
            });
        } else {
            // Colores predeterminados en caso de otro estado
            colors.push({
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color predeterminado
                borderColor: 'rgba(54, 162, 235, 1)'
            });
        }
    });

    // Crear el gráfico
   // Crear el gráfico
var ctx = document.getElementById('chartEstat').getContext('2d');
var chart = new Chart(ctx, {
    type: 'doughnut',
    size: 1,
   data: {
        labels: labels,
        datasets: [{
            label: labels.map(function(label) {
                return label ;
            }),
            data: data,
            backgroundColor: labels.map(function(label, index) {
                return colors[index].backgroundColor;
            }),
            borderColor: labels.map(function(label, index) {
                return colors[index].borderColor;
            }),
            borderWidth: 1
        }]
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

chart.data.datasets.forEach(function(dataset, index) {
    dataset.label = 'Quantitat de propostes';
});

chart.update();
</script>

</main>

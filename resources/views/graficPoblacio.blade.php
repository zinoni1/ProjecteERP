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
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Añadir Cliente</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <a href="{{ route('mostrarClientes') }}" class="btn btn-primary">Mostrar todos los clientes</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <a href="{{ route('graficPoblacio') }}" class="btn btn-primary">Estadisticas Poblacion</a>
                    </div>
                </div>
            </div>
        </section>
        </div>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Distribución de Población de Clientes') }}</div>

                <div class="card-body">
                    <canvas id="chartPoblacion"></canvas>
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
    
    // Crear el gráfico
    var ctx = document.getElementById('chartPoblacion').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de Clientes por Población',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Clientes'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Población'
                    }
                }
            }
        }
    });
</script>
</main>

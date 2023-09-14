@extends('adminlte::page')


@section('content_header')
    <div class="container">

        <div class="row">
 <!-- INICIO HTML GRAFICA DE USUSARIOS REGISTRADOS DE LA APP -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card card-transparent">
                        <div class="card-body">
                            <div class="user-profile">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                    <h3>{{ $userCount }}</h3>
                                    <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                    <i class="fa fa-fw fa-user"></i>
                                    </div>

                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
 <!-- FIN HTML GRAFICA DE USUSARIOS REGISTRADOS DE LA APP -->

 <!-- INICIO HTML GRAFICA DE INICIOS DE SECCION DE LA APP -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Revenues</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="userLoginsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- FIN HTML GRAFICA DE INICIOS DE SECCION DE LA APP -->

<!-- INICIO HTML GRAFICA DE TRAFICO DE LA APP -->
    <head>


        <style>
            canvas {
                height: 300px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="card-body">
            <div class="p-0 tab-content">
                <div class="chart tab-pane active" id="revenue-chart">
                    <canvas id="revenue-chart-canvas"></canvas>
                </div>
            </div>
        </div>


    </body>

<!-- FIN HTML GRAFICA DE TRAFICO DE LA APP -->

@endsection

@section('adminlte_js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
 //script de ingresos diarios a la app
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('userLoginsChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Ingresos diarios',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        });

 // script de la grafica de barras de trafico de la app

            // Datos de ejemplo
            var data = {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Trafico de la App',
                    data: [12, 19, 3, 5, 2, 8, 15, 6, 9, 10, 4, 7],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)', // Rojo
                        'rgba(54, 162, 235, 0.5)', // Azul
                        'rgba(255, 206, 86, 0.5)', // Amarillo
                        'rgba(75, 192, 192, 0.5)', // Verde agua
                        'rgba(153, 102, 255, 0.5)', // Morado
                        'rgba(255, 159, 64, 0.5)', // Naranja
                        'rgba(255, 99, 132, 0.5)', // Rojo
                        'rgba(54, 162, 235, 0.5)', // Azul
                        'rgba(255, 206, 86, 0.5)', // Amarillo
                        'rgba(75, 192, 192, 0.5)', // Verde agua
                        'rgba(153, 102, 255, 0.5)', // Morado
                        'rgba(255, 159, 64, 0.5)' // Naranja
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', // Rojo
                        'rgba(54, 162, 235, 1)', // Azul
                        'rgba(255, 206, 86, 1)', // Amarillo
                        'rgba(75, 192, 192, 1)', // Verde agua
                        'rgba(153, 102, 255, 1)', // Morado
                        'rgba(255, 159, 64, 1)', // Naranja
                        'rgba(255, 99, 132, 1)', // Rojo
                        'rgba(54, 162, 235, 1)', // Azul
                        'rgba(255, 206, 86, 1)', // Amarillo
                        'rgba(75, 192, 192, 1)', // Verde agua
                        'rgba(153, 102, 255, 1)', // Morado
                        'rgba(255, 159, 64, 1)' // Naranja
                    ],
                    borderWidth: 1
                }]
            };

            // Configuración de la gráfica
            var options = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Crear la gráfica
            var ctx = document.getElementById('revenue-chart-canvas').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });

    </script>
@stop

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Dashboard Monitoring Proyek</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Proyek</h5>
                    <h3>{{ $totalProjects }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Proyek Aktif</h5>
                    <h3>{{ $chartData['data'][0] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow text-white bg-danger mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Proyek Dibatalkan</h5>
                    <h3>{{ $chartData['data'][2] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <!-- Pie Chart -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Grafik Status Proyek</div>
                <div class="card-body">
                    <canvas id="projectsPieChart" style="max-height: 250px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Jumlah Proyek per Status</div>
                <div class="card-body">
                    <canvas id="projectsBarChart" style="max-height: 250px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Line Chart -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Proyek Baru per Bulan</div>
                <div class="card-body">
                    <canvas id="projectsLineChart" style="max-height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Doughnut Chart -->
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Monitoring Status Tugas</div>
                <div class="card-body">
                    <canvas id="tasksDoughnutChart" style="max-height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pie Chart
    var ctxPie = document.getElementById('projectsPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: {!! json_encode($chartData['labels']) !!},
            datasets: [{
                data: {!! json_encode($chartData['data']) !!},
                backgroundColor: {!! json_encode($chartData['colors']) !!}
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // Bar Chart
    var ctxBar = document.getElementById('projectsBarChart').getContext('2d');
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: {!! json_encode($barChartData['labels']) !!},
            datasets: [{
                label: 'Jumlah Proyek',
                data: {!! json_encode($barChartData['data']) !!},
                backgroundColor: {!! json_encode($barChartData['colors']) !!}
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } },
            plugins: { legend: { display: false } }
        }
    });

    // Line Chart
    var ctxLine = document.getElementById('projectsLineChart').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Proyek Baru',
                data: {!! json_encode($projectsByMonth) !!},
                borderColor: '#ff6384',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
    });

   // Doughnut Chart for Tasks
   var ctxDoughnut = document.getElementById('tasksDoughnutChart').getContext('2d');
    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($taskChartData['labels']) !!},
            datasets: [{
                data: {!! json_encode($taskChartData['data']) !!},
                backgroundColor: {!! json_encode($taskChartData['colors']) !!}
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
    });
</script>
@endsection

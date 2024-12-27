<style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
            min-height: 100vh;
            padding: 20px;
            position: fixed;
            width: 250px;
        }

        .sidebar a {
            color: #f8f9fa;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            padding: 20px;
        }

        .info-box {
            padding: 20px;
            border-radius: 10px;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .info-box.red {
            background-color: #dc3545;
        }

        .info-box.yellow {
            background-color: #ffc107;
        }

        .info-box.blue {
            background-color: #007bff;
        }

        .info-box.green {
            background-color: #28a745;
        }

        .chart-container {
            height: 300px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h5 {
            margin-bottom: 15px;
        }
    </style>
    

 <!-- Content -->
 <div class="content">
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <div class="info-box blue">
                    <p><i class="bi bi-people fs-4"></i></p>
                    <h5>1</h5>
                    <p>Usuario</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box red">
                    <p><i class="bi bi-bag-check fs-4"></i></p>
                    <h5>8 </h5>
                    <p>Fechamentos</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box yellow">
                    <p><i class="bi bi-boxes fs-4"></i></p>
                    <h5>100+</h5>
                    <p>Itens</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box green">
                    <p><i class="bi bi-cash-coin fs-4"></i></p>
                    <h5>5000+</h5>
                    <p>Total Entradas</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Gráfico de Ganhos</h5>
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Novos Ganhos</h5>
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Total de Ganhos</h5>
                    <div class="chart-container">
                        <canvas id="areaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Distribuição de Ganhos</h5>
                    <div class="chart-container">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Bar Chart
        const barChartCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barChartCtx, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'],
                datasets: [{
                    label: 'Earnings',
                    data: [80, 60, 40, 70, 30, 50, 90, 60, 70, 60, 70, 80],
                    backgroundColor: 'rgba(231, 13, 13, 0.86)',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Line Chart
        const lineChartCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineChartCtx, {
            type: 'line',
            data: {
                labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'],
                datasets: [{
                    label: 'Ganhos Diarios',
                    data: [30, 50, 40, 60, 57],
                    backgroundColor: 'rgba(53, 162, 235, 0.4)',
                    borderColor: 'rgb(53, 162, 235)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Area Chart
        const areaChartCtx = document.getElementById('areaChart').getContext('2d');
        new Chart(areaChartCtx, {
            type: 'line',
            data: {
                labels: Array.from({ length: 30 }, (_, i) => `Dia ${i + 1}`),
                datasets: [{
                    label: 'Progresso de Ganhos',
                    data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 100)),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    // Pie Chart
    const pieChartCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieChartCtx, {
        type: 'pie',
        data: {
            labels: ['Serviços', 'Produtos', 'Outros'],
            datasets: [{
                data: [40, 30, 30], // Dados fictícios
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
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
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    </script>
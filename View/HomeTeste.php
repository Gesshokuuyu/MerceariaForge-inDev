<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Flat Lab Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #eef2f7;
            font-family: Arial, sans-serif;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        .info-box {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: white;
            text-align: center;
        }
        .info-box.green {
            background-color: #1abc9c;
        }
        .info-box.blue {
            background-color: #3498db;
        }
        .info-box.dark-green {
            background-color: #2ecc71;
        }
        .box-header {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .navbar-brand span {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            .info-box {
                font-size: 0.9rem;
            }
            .box-header {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar with Offcanvas -->
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <div class="float-end d-flex align-items-center">
                    <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-list"></i>
                    </button>
                    <span class="text-white">Mercearia Forge</span>
                </div>
            </a>

            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="list-group">
                        <li class="list-group-item"><i class="bi bi-house-door me-2"></i>Home</li>
                        <li class="list-group-item"><i class="bi bi-gear me-2"></i>Painel Administrativo</li>
                        <li class="list-group-item"><i class="bi bi-bar-chart me-2"></i>DashBoards</li>
                        <li class="list-group-item"><i class="bi bi-box me-2"></i>Itens</li>
                        <li class="list-group-item"><i class="bi bi-calendar3 me-2"></i>Fechamento Mensal</li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Header -->
            <div class="col-12 text-center mb-4">
                <h1>Earning Dashboard</h1>
                <p class="text-muted">Detailed insights about your earnings</p>
            </div>
        </div>

        <div class="row">
            <!-- Info Boxes -->
            <div class="col-md-4 col-sm-12">
                <div class="info-box green">
                    <div class="value display-6">Friday $57.00</div>
                    <div class="label">15% Increase</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="info-box blue">
                    <div class="value display-6">June 23 Days</div>
                    <div class="label">65% Progress</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="info-box dark-green">
                    <div class="value display-6">$76,547,678</div>
                    <div class="label">Total Earnings</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Graphical Data -->
            <div class="col-lg-6 col-md-12">
                <div class="card p-3">
                    <div class="box-header">Earning Graph</div>
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card p-3">
                    <div class="box-header">New Earning</div>
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bar Chart
        const barChartCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barChartCtx, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                    label: 'Earnings',
                    data: [80, 60, 40, 70, 30, 50, 90, 60, 70, 60, 70, 80],
                    backgroundColor: 'rgba(128, 128, 128, 0.8)',
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
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                datasets: [{
                    label: 'New Earnings',
                    data: [30, 50, 40, 60, 57],
                    backgroundColor: 'rgba(26, 188, 156, 0.2)',
                    borderColor: 'rgba(26, 188, 156, 1)',
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
    </script>

</body>
</html>

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
                    <h5>495</h5>
                    <p>New Users</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box red">
                    <h5>947</h5>
                    <p>Sales</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box yellow">
                    <h5>328</h5>
                    <p>New Orders</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box green">
                    <h5>10,328</h5>
                    <p>Total Profit</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Earning Graph</h5>
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>New Earnings</h5>
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Total Earnings</h5>
                    <div class="chart-container">
                        <canvas id="areaChart"></canvas>
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
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
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
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                datasets: [{
                    label: 'Daily Earnings',
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
                labels: Array.from({ length: 30 }, (_, i) => `Day ${i + 1}`),
                datasets: [{
                    label: 'Earnings Progress',
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
    </script>

<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f7f7f7; /* Cor de fundo */
}

.box-dif{
    box-shadow: #495057;
    background-color: rgb(216, 213, 213);
    border-radius: 10px ;
    padding-left: 50px;
    padding-right: 50px;
    margin-top: 5px;
    margin: 10px;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: none;
    margin-bottom: 20px;
    border-radius: 10px;
}

.chart-container {
    position: relative;
    height: 300px;
    width: 100%;
}

.info-box {
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    color: white;
}

.info-box.green {
    background-color: #28a745; /* Green */
    margin-top: 5px;
}
 
.info-box.red {
    background-color:rgb(212, 104, 104); /* Red */
    margin-top: 5px;
}

.info-box.red {
    background-color:rgb(212, 104, 104); /* Red */
    margin-top: 5px;
}

.info-box.blue {
    background-color: #007bff; /* Blue */
    margin-top: 5px;
}

.info-box.dark-green {
    background-color: #17a2b8; /* Teal */
    margin-top: 5px;
}

.box-header {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.navbar {
    background-color: #343a40;
}

.navbar .navbar-brand {
    color: #f8f9fa;
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
}

.navbar .navbar-brand:hover {
    color: #ffd700;
}

.offcanvas-header {
    background-color: #343a40;
    color: #fff;
}

.offcanvas-body {
    background-color: #f4f4f4;
}

.list-group-item {
    color: #495057;
    border: none;
    background-color: transparent;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    color: #007bff;
}

.container{
    border: none;
}


    </style>

    

<div class="container mt-5">
       
            <!-- Header -->
          
        <div class="row">
            <!-- Info Boxes -->
            <div class="col-md-4">
                <div class="info-box red">
                    <div class="value">Friday $57.00</div>
                    <div class="label">15% Crescimento em relação ao mês passado</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box blue">
                    <div class="value">Mês Atual</div>
                    <div class="label" id="Progresso">65% Progresso</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box green">
                    <div class="value">$76,547,678</div>
                    <div class="label">Receitas</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Graphical Data -->
            <div class="col-md-6">
                <div class="card p-3">
                    <div class="box-header">Grafico de Ganhos</div>
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <div class="box-header">Possiveis Oportunidades de Venda</div>
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
        labels: ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'],
        datasets: [{
            label: 'Earnings',
            data: [80, 60, 40, 70, 30, 50, 90, 60, 70, 60, 70, 80],
            backgroundColor: 'rgba(231, 13, 13, 0.86)',  // Blue color for the bars
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
            label: 'Entrada de Pedidos',
            data: [30, 50, 40, 60, 57],
            backgroundColor: 'rgba(235, 53, 53, 0.56)',  // Green fill
            borderColor: 'rgb(165, 9, 9)',  // Green border
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

<style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
            overflow-y: auto;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <?php include_once 'MenuLateral.php'; ?>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Bem-vindo ao Painel de Pedidos</h2>
        <p>Veja os pedidos e os dados do sistema.</p>

        <!-- Gráfico -->
        <canvas id="orderChart" height="100"></canvas>

        <!-- Tabela de Pedidos -->
        <div class="table-container">
            <h4 class="mt-4">Tabela de Pedidos</h4>
            <table class="table table-striped" id = 'table-orders'>
                <thead>
                    <tr>
                        <th>Cod. Ped.</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Gráfico de Pedidos
        const ctx = document.getElementById('orderChart').getContext('2d');
        const orderChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                datasets: [{
                    label: 'Pedidos por mês',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // SweetAlert para exclusão
        $(document).on('click', '.btn-delete', function () {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Você tem certeza?',
                text: `Deseja excluir o pedido ${id}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Excluído!', 'O pedido foi excluído com sucesso.', 'success');
                }
            });
        });
    </script>
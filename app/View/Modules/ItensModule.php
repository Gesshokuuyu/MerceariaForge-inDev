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
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <?php include_once 'MenuLateral.php'; ?>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Itens no Estoque</h2>
        <p>Gerencie os itens disponíveis no sistema.</p>

        <!-- Gráfico -->
        <canvas id="itemChart" height="100"></canvas>

        <!-- Tabela de Itens -->
        <div class="table-container">
            <h4 class="mt-4">Tabela de Itens</h4>
            <table class="table table-striped" id = 'table-itens'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
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
        // Gráfico de Itens
        const ctx = document.getElementById('itemChart').getContext('2d');
        const itemChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Eletrônicos', 'Móveis', 'Roupas', 'Alimentos'],
                datasets: [{
                    data: [10, 5, 7, 15],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        // SweetAlert para exclusão
        $(document).on('click', '.btn-delete', function () {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Você tem certeza?',
                text: `Deseja excluir o item ${id}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Excluído!', 'O item foi excluído com sucesso.', 'success');
                }
            });
        });
    </script>
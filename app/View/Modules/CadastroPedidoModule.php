<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pedidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow: hidden;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .form-section {
            margin-bottom: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-section h4 {
            margin-bottom: 15px;
            color: #495057;
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
        <h2 class="mb-4">Cadastro de Pedidos</h2>

        <!-- Capa do Pedido -->
        <div class="form-section">
            <h4>Capa do Pedido</h4>
            <form id="pedidoCapaForm">
                <div class="mb-3">
                    <label for="pedidoCliente" class="form-label">Nome do Cliente</label>
                    <input type="text" class="form-control" id="pedidoCliente" placeholder="Digite o nome do cliente" required>
                </div>
                <div class="mb-3">
                    <label for="pedidoData" class="form-label">Data do Pedido</label>
                    <input type="date" class="form-control" id="pedidoData" required>
                </div>
            </form>
        </div>

        <!-- Itens do Pedido -->
        <div class="form-section">
            <h4>Itens do Pedido</h4>
            <form id="pedidoItensForm" class="row g-3">
                <div class="col-md-8">
                    <label for="itemDescricao" class="form-label">Descrição do Item</label>
                    <input type="text" class="form-control" id="itemDescricao" placeholder="Digite a descrição do item" required>
                </div>
                <div class="col-md-4">
                    <label for="itemQuantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="itemQuantidade" placeholder="Quantidade" required>
                </div>
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-secondary" id="addItem">Adicionar Item</button>
                </div>
            </form>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="itensTabela">
                </tbody>
            </table>
        </div>

        <!-- Finalização do Pedido -->
        <div class="form-section">
            <h4>Finalização</h4>
            <button class="btn btn-primary w-100" id="finalizarPedido">Finalizar Pedido</button>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Adicionar itens ao pedido
        $('#addItem').on('click', function () {
            const descricao = $('#itemDescricao').val();
            const quantidade = $('#itemQuantidade').val();

            if (!descricao || !quantidade) {
                Swal.fire('Erro', 'Por favor, preencha todos os campos.', 'error');
                return;
            }

            // Adiciona o item à tabela
            $('#itensTabela').append(`
                <tr>
                    <td>${descricao}</td>
                    <td>${quantidade}</td>
                    <td><button class="btn btn-sm btn-danger btn-remove-item">Remover</button></td>
                </tr>
            `);

            // Limpar os campos
            $('#itemDescricao').val('');
            $('#itemQuantidade').val('');
        });

        // Remover item da tabela
        $(document).on('click', '.btn-remove-item', function () {
            $(this).closest('tr').remove();
        });

        // Finalizar Pedido
        $('#finalizarPedido').on('click', function () {
            const cliente = $('#pedidoCliente').val();
            const data = $('#pedidoData').val();
            const itens = [];

            $('#itensTabela tr').each(function () {
                const descricao = $(this).find('td').eq(0).text();
                const quantidade = $(this).find('td').eq(1).text();
                itens.push({ descricao, quantidade });
            });

            if (!cliente || !data || itens.length === 0) {
                Swal.fire('Erro', 'Por favor, preencha todos os campos e adicione ao menos um item.', 'error');
                return;
            }

            Swal.fire('Pedido Finalizado!', `Pedido do cliente ${cliente} foi registrado com sucesso!`, 'success').then(() => {
                // Limpar formulário
                $('#pedidoCapaForm')[0].reset();
                $('#pedidoItensForm')[0].reset();
                $('#itensTabela').empty();
            });
        });
    </script>
</body>
</html>

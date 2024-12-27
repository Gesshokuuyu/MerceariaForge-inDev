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
    </style>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <?php include_once 'MenuLateral.php'; ?>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Cadastrar Novo Item</h2>
        <p>Preencha as informações do item abaixo.</p>

        <!-- Formulário de Cadastro -->
        <form id="itemForm">
            <div class="mb-3">
                <label for="itemName" class="form-label">Nome do Item</label>
                <input type="text" class="form-control" id="itemName" placeholder="Digite o nome do item" required>
            </div>
            <div class="mb-3">
                <label for="itemCategory" class="form-label">Categoria</label>
                <select class="form-select" id="itemCategory" required>
                    <option value="">Selecione a categoria</option>
                    <option value="Eletrônicos">Eletrônicos</option>
                    <option value="Móveis">Móveis</option>
                    <option value="Roupas">Roupas</option>
                    <option value="Alimentos">Alimentos</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="itemQuantity" class="form-label">Quantidade</label>
                <input type="number" class="form-control" id="itemQuantity" placeholder="Digite a quantidade" required>
            </div>
            <div class="mb-3">
                <label for="itemPrice" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="itemPrice" placeholder="Digite o preço" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Item</button>
        </form>
    </div>

    <!-- Scripts -->
    <script>
        // Manipulação do formulário
        $(document).ready(function () {
            $('#itemForm').on('submit', function (event) {
                event.preventDefault();

                // Coleta dos dados
                const itemName = $('#itemName').val();
                const itemCategory = $('#itemCategory').val();
                const itemQuantity = $('#itemQuantity').val();
                const itemPrice = $('#itemPrice').val();

                // Validação básica
                if (!itemName || !itemCategory || !itemQuantity || !itemPrice) {
                    Swal.fire('Erro', 'Por favor, preencha todos os campos.', 'error');
                    return;
                }

                // Simulação de envio
                Swal.fire({
                    title: 'Item Cadastrado!',
                    text: `O item "${itemName}" foi cadastrado com sucesso.`,
                    icon: 'success'
                }).then(() => {
                    // Limpar formulário
                    $('#itemForm')[0].reset();
                });
            });
        });
    </script>
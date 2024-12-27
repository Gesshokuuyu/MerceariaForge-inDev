<style>
        body {
            display: flex;
            min-height: 100vh;
            overflow: auto;
            background-color: #f8f9fa;
        }

        body::-webkit-scrollbar {
            width: 10px;
        }

        body::-webkit-scrollbar-track {
            background: #e0e0e0;
        }

        body::-webkit-scrollbar-thumb {
            background:rgb(255, 255, 255);
            border-radius: 10px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: #0056b3;
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

    <!-- Sidebar -->
    <div class="sidebar">
    <?php include_once 'MenuLateral.php'; ?>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4">Cadastro de Clientes</h2>
        <form action="">
        <!-- Informações do Cliente -->
        <div class="form-section">
            <h4>Informações do Cliente</h4>
            <form id="clienteForm">
                <div class="mb-3">
                    <label for="clienteNome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="clienteNome" placeholder="Digite o nome completo" required>
                </div>
                <div class="mb-3">
                    <label for="clienteEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="clienteEmail" placeholder="Digite o e-mail" required>
                </div>
                <div class="mb-3">
                    <label for="clienteTelefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="clienteTelefone" placeholder="(xx) xxxx-xxxx" required>
                </div>
            </form>
        </div>

        <!-- Endereço do Cliente -->
        <div class="form-section">
            <h4>Endereço</h4>
            <form id="enderecoForm" class="row g-3">
                <div class="col-md-6">
                    <label for="enderecoRua" class="form-label">Rua</label>
                    <input type="text" class="form-control" id="enderecoRua" placeholder="Digite a rua" required>
                </div>
                <div class="col-md-6">
                    <label for="enderecoNumero" class="form-label">Número</label>
                    <input type="text" class="form-control" id="enderecoNumero" placeholder="Número" required>
                </div>
                <div class="col-md-6">
                    <label for="enderecoCidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="enderecoCidade" placeholder="Digite a cidade" required>
                </div>
                <div class="col-md-6">
                    <label for="enderecoEstado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="enderecoEstado" placeholder="Digite o estado" required>
                </div>
            </form>
        </div>

        <!-- Finalização -->
        <div class="form-section">
            <h4>Finalização</h4>
            <button type="button" class="btn btn-primary w-100" id="salvarCliente">Salvar Cliente</button>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Salvar Cliente
        $('#salvarCliente').on('click', function (event) {
    event.preventDefault(); // Impede o comportamento padrão de envio do formulário

    const nome = $('#clienteNome').val();
    const email = $('#clienteEmail').val();
    const telefone = $('#clienteTelefone').val();
    const rua = $('#enderecoRua').val();
    const numero = $('#enderecoNumero').val();
    const cidade = $('#enderecoCidade').val();
    const estado = $('#enderecoEstado').val();

    if (!nome || !email || !telefone || !rua || !numero || !cidade || !estado) {
        Swal.fire('Erro', 'Por favor, preencha todos os campos.', 'error');
        return;
    }

    Swal.fire('Sucesso!', `Cliente ${nome} foi cadastrado com sucesso!`, 'success').then(() => {
        // Limpar formulários
        $('#clienteForm')[0].reset();
        $('#enderecoForm')[0].reset();
    });
});
    </script>
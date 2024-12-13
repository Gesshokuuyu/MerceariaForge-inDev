<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .register-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>

<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h3 class="text-center">Crie sua Conta</h3>
                <form id="registerForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="name" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                </form>
                <div class="text-center mt-3">
                    <p>Já tem uma conta? <a href="login">Faça login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Função para simular o processo de cadastro e exibir o SweetAlert
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita o envio real do formulário

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            // Senhas não coincidem
            Swal.fire({
                title: 'Erro!',
                text: 'As senhas não coincidem.',
                icon: 'error',
                confirmButtonText: 'Tentar novamente'
            });
        } else if (name && email && password) {
            // Cadastro bem-sucedido
            Swal.fire({
                title: 'Sucesso!',
                text: 'Cadastro realizado com sucesso. Você pode fazer login agora.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "login.html"; // Redireciona para a página de login
            });
        } else {
            // Campos obrigatórios não preenchidos
            Swal.fire({
                title: 'Erro!',
                text: 'Por favor, preencha todos os campos.',
                icon: 'error',
                confirmButtonText: 'Tentar novamente'
            });
        }
    });
</script>

</body>
</html>

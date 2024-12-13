<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .login-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h3 class="text-center">Bem-vindo</h3>
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
                <div class="text-center mt-3">
                    <p>Não tem uma conta? <a href="sigin">Cadastre-se</a></p>
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
    // Função para simular a autenticação e exibir o SweetAlert
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita o envio real do formulário

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (email === 'teste@teste.com' && password === '123456') {
            // Login bem-sucedido
            Swal.fire({
                title: 'Sucesso!',
                text: 'Bem-vindo ao seu painel.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
            // Redireciona para a home após o OK do SweetAlert
            location.href = '?route=home';  // Caminho para a página de home
        });
        } else {
            // Falha no login
            Swal.fire({
                title: 'Erro!',
                text: 'Email ou senha inválidos.',
                icon: 'error',
                confirmButtonText: 'Tentar novamente'
            });
        }
    });
</script>

</body>
</html>

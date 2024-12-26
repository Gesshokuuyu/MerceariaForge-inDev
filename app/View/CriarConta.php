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
                <form id="registerForm" name="registerForm" method = "post">
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
                    <button type="button" onclick="Register()" class="btn btn-primary w-100">Cadastrar</button>
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
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Função para simular o processo de cadastro e exibir o SweetAlert
    function Register() {
        event.preventDefault(); 

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
        } else if (name && email && password && confirmPassword) {
            $.ajax({
                url: "../app/Controller/LoginController.php",
                type: 'post',
                data: {
                    function: 'CreateAccount',
                    name: name,
                    email: email,
                    password: password,
                    confirmPassword: confirmPassword
                },
                success: function(data) {
                    data = JSON.parse(data)
                    if (data.success === false) {
                        Swal.fire({
                            title: data.message,  
                            text: data.message, 
                            icon: 'error',
                            confirmButtonText: 'Tentar novamente'
                        });
                    } else if (data.success === true) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "login";
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Erro na requisição AJAX: ", error);
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Houve um erro ao processar sua solicitação.',
                        icon: 'error',
                        confirmButtonText: 'Fechar'
                    });
                }
            });
            
        } else {
            Swal.fire({
                title: 'Erro!',
                text: 'Por favor, preencha todos os campos.',
                icon: 'error',
                confirmButtonText: 'Tentar novamente'
            });
        }
    };
</script>

</body>
</html>

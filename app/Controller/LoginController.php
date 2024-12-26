<?php 

require_once '../Model/UserModel.php';
require_once '../Sessions/SessionManager.php';

class LoginController extends UserModel {

    public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
    

    public function VerifyLoginUser($dataUser, $type = 'CreateAccount') {
        if ($dataUser) {
            if ($type == 'CreateAccount') { 
                if ($dataUser['password'] !== $dataUser['confirmPassword']) {
                    return 1;
                }
    
                $verifyEmail = $this->VerifyEmailUser($dataUser['email']);
                if ($verifyEmail == 1) {
                    return 2;
                }
                
                return 3;
            } else {

            }
        } else {
            return [
                'message' => 'Login negado!',
                'success' => false
            ];
        }
    }

    public function CreateAccount()
    {
        $dataUser = $_REQUEST;
    
        $verify = $this->VerifyLoginUser($dataUser);
    
        if ($verify == 1) {
            echo json_encode([
                'message' => 'As senhas não coincidem!',
                'success' => false
            ]);
        } elseif ($verify == 2) {
            echo json_encode([
                'message' => 'Email já existente!',
                'success' => false
            ]);
        } elseif ($verify == 3) {
            $dataUser['password'] = $this->hashPassword($dataUser['password']);
            $user = new UserModel($dataUser);
            $cadastro = $user->CreateUserLogin();
            if ($cadastro == 1) {
                echo json_encode([
                    'message' => 'Usuário registrado com sucesso!',
                    'success' => true
                ]);
            }
        } else {
            echo json_encode([
                'message' => 'Erro Desconhecido',
                'success' => false
            ]);
        }
    }
    


    public function login() {
    
        echo "Login efetuado com sucesso!";
    }
}

$allowedFunctions = [
                        'CreateAccount',
                         'login'                        
                    ];

if (isset($_POST['function'])) {
    $function = $_POST['function'];

    if (in_array($function, $allowedFunctions)) {
        $loginController = new LoginController();

        if (method_exists($loginController, $function)) {
            $loginController->$function();
        } else {
            http_response_code(400);
            echo "Erro: Método não encontrado.";
        }
    } else {
        http_response_code(403); 
        echo "Erro: Método não permitido.";
    }
} else {
    http_response_code(400); 
    echo "Erro: Nenhuma função especificada.";
}

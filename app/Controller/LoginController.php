<?php 

include_once '../Model/UserModel.php';

class LoginController extends UserModel {

    public function CreateAccount() {
      
        echo "Conta criada com sucesso!";
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

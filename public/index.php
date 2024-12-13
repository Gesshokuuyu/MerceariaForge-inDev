<?php
require_once '../config/routes.php';

// Gerencia as rotas
$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':
        include '../app/views/login.php';
        break;
    case 'logout':
        require_once '../app/controllers/SessionController.php';
        $controller = new SessionController();
        $controller->logout();
        break;
    default:
        echo "Página não encontrada.";
        break;
}

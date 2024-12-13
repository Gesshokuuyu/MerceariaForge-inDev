<?php
require_once '../config/routes.php';

// Gerencia as rotas
$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':
        include '../app/View/login.php';
        break;
    case 'sigin':
        include '../app/View/CriarConta.php';
        break;
    case 'logout':
        require_once '../app/Controller/SessionController.php';
        $controller = new SessionController();
        $controller->logout();
        break;
    case 'home';
        include_once '../app/View/Home.php';
        break;
    default:
        echo "Página não encontrada.";
        break;
}

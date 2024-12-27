<?php
require_once '../config/routes.php';
require_once '../app/Sessions/SessionManager.php';

$SessionManager = new SessionManager();
if($SessionManager->isLoggedIn() !== true){
    header('Location: /login');
}
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
    case 'PainelPed';
        include_once '../app/View/PainelPed.php';
        break;
    default:
        echo "Página não encontrada.";
        break;
}

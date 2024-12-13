<?php
require_once '../app/Sessions/SessionManager.php';

class SessionController
{
    public function login($username, $password)
    {
        // Simulação de autenticação
        if ($username === 'admin' && $password === '1234') {
            SessionManager::startSession();
            SessionManager::set('user_id', 1);
            SessionManager::set('username', $username);

            header('Location: /dashboard');
            exit;
        } else {
            return "Usuário ou senha inválidos.";
        }
    }

    public function logout()
    {
        SessionManager::startSession();
        SessionManager::destroySession();
        header('Location: /login');
        exit;
    }
}

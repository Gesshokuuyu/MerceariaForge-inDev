<?php

class UserModel
{
    public static function authenticate($username, $password)
    {
        // Aqui você pode consultar o banco de dados para verificar o usuário
        if ($username === 'admin' && $password === '1234') {
            return [
                'id' => 1,
                'username' => $username
            ];
        }
        return null;
    }
}

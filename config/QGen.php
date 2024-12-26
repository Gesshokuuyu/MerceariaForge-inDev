<?php
require_once __DIR__ . '/config.php';

class UserQueries extends Database {

    public function getAllUsers() {
        return $this->query("SELECT * FROM users");
    }

    public function getUserById($id) {
        return $this->query("SELECT * FROM users WHERE id = :id", ['id' => $id]);
    }

    public function getUserByEmail($email) {
        return $this->query("SELECT * FROM MFG_USERS WHERE USER_EMAIL = :USER_EMAIL", ['USER_EMAIL' => $email]);
    }

    public function createUser($data)
{
    $fields = implode(',', array_keys($data)); 
    $placeholders = implode(',', array_map(fn($key) => ":$key", array_keys($data)));

    $sql = "INSERT INTO MFG_USERS ($fields) VALUES ($placeholders)";

    try {
        $this->execute($sql, $data);
        return 1; // Sucesso
    } catch (\PDOException $e) {
        // Captura o erro e exibe informações relevantes
        throw new Exception("Erro de SQL ao criar usuário. Query: $sql. Dados: " . json_encode($data) . ". Mensagem: " . $e->getMessage());
    }
}
    

    public function deleteUser($id) {
        return $this->execute("DELETE FROM users WHERE id = :id", ['id' => $id]);
    }
}

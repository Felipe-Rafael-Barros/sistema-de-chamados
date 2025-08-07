<?php

class User {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    // Autenticação
    public function userLogin($username, $password) {  // Padrão camelCase
        $query = $this->database->prepare(
            "SELECT id, username, password FROM usuarios WHERE username = ?"
        );
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Verificação de sessão foi aceita/iniciada
    public static function isLoggedIn() {  
        return isset($_SESSION['user_id']);
    }

    // Encerrar sessão 
    public static function logout() { 
        session_unset();
        session_destroy();
    }
}
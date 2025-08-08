<?php
// Controlador de Autenticação do sistema
class AuthController {

    private $userModel;

    public function __construct($database) {
        $this->userModel = new User($database);

    }

    //Exibição da tela de login

    public function showLogin() {
        if ($this->userModel->isLoggedIn()) {
            header("Location: /tickets");
            exit;
        }
        require __DIR__ . '/../../src/Views/auth/login.php';
    }

    // Sistema de Processamento do formulário da página de login

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);
        

            $user = $this->userModel->userLogin($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                $redirect_url = $_SESSION['redirect_url'] ?? '/tickets';
                unset($_SESSION['redirect_url']);

                header('Location: ' . $redirect_url);
                exit;
            }
            else {
                $error = "Credenciais inválidas";
                
            }
        
        }
        require __DIR__ . '/../../src/View/auth/login.php';
    }

    // Terminar a sessão

    public function logout() {
        User::logout();
        header('Location: /login');
        exit;
    }
}

?>
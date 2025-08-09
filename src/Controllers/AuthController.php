<?php
class AuthController {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        
    }

    public function authentication($username, $password) {
        //Consulta ao banco de dados
        $stmt = $this->pdo->prepare("SELECT id, username, password FROM usuarios WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) { //Avalia se o usuário indicado existe


            if ($password === $user['password']) { //Avalia se a senha dada e a do banco de dados estão corretas
                $_SESSION['userLogged'] = [
                    'id' => $user['id'],
                    'username' => $user['username']
                ];
                header("Location: /sistema-de-chamados/src/Views/Tickets/index.php");
                exit;
            } else {
                echo "<script>
                    alert('usuário ou Senha incorreta, tente novamente.');
                    window.location.href = '/sistema-de-chamados/src/Views/auth/login.php';
                </script>";
                exit;
            }
        } else {
            echo "<script>
                alert('Usuário ou senha incorreta, tente novamente.');
                window.location.href = '/sistema-de-chamados/src/Views/auth/login.php';
            </script>";
            exit;
        }
    }

    

    
}
?>
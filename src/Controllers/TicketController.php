<?php
class TicketController {
    
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Cria um novo chamado vinculado ao usuário logado
    public function createTicket($titulo, $descricao) {
        
        // Verifica se o usuário está logado
        if (!isset($_SESSION['userLogged']['id'])) {
            header("Location: /sistema-de-chamados/src/Views/auth/login.php");
            exit;
        }

        // Prepara e executa a query
        $stmt = $this->pdo->prepare(
            'INSERT INTO chamados (titulo, descricao, usuario_id, status) 
             VALUES (?, ?, ?, "aberto")'
        );
        $stmt->execute([
            filter_var($titulo),
            filter_var($descricao),
            $_SESSION['userLogged']['id']
        ]);

        // Redireciona após criar
        header("Location: /sistema-de-chamados/src/Views/Tickets/index.php");
        exit;
    }


    public function getTicketById($id) {
    $stmt = $this->pdo->prepare(
        "SELECT * FROM chamados WHERE id = ? LIMIT 1"
    );
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Atualiza um chamado existente
public function updateTicket($id) {
    if (!isset($_SESSION['userLogged']['id'])) {
        header("Location: /sistema-de-chamados/src/Views/auth/login.php");
        exit;
    }

    // Validação dos dados do formulário
    $allowedStatuses = ['aberto', 'em_andamento', 'fechado'];
    $status = in_array($_POST['status'], $allowedStatuses) ? $_POST['status'] : 'aberto';

    $stmt = $this->pdo->prepare(
        'UPDATE chamados 
         SET titulo = ?, descricao = ?, status = ?, updated_at = NOW() 
         WHERE id = ?'
    );
    
    try {
        $stmt->execute([
            filter_input(INPUT_POST, 'titulo'),
            filter_input(INPUT_POST, 'descricao'),
            $status,
            $id
        ]);
        $_SESSION['success'] = "Chamado atualizado com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Erro ao atualizar chamado: " . $e->getMessage();
    }
    
    header("Location: /sistema-de-chamados/src/Views/tickets/index.php");
    exit;
}

    public function listTickets() {

        
        if (!isset($_SESSION['userLogged']['id'])) {
            header("Location: /sistema-de-chamados/src/Views/auth/login.php");
            exit;
        }

        $stmt = $this->pdo->prepare(
            "SELECT c.*, u.username as autor 
             FROM chamados c
             JOIN usuarios u ON c.usuario_id = u.id
             ORDER BY c.created_at DESC"
        );
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        

}
?>
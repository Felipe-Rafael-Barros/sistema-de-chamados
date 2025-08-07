<?php

class Ticket {
    
    private $database;

    function __construct($database){
        $this->database = $database;
    }

    //Funcionalida de criação de chamados
    public function CreateTicket($data) {
        $queryDB = $this->database->prepare("INSERT INTO Chamados (tituto, descricao, status, user_id) VALUES (?, ? , 'Aberto', ?") ;
        return $queryDB->execute($data['titulo'],$data['descricao'],$_SESSION['user_id']) ;
    }
    
    // Ler todos os chamados configurados

    public function ReadTickets($data) {
        $queryDB = $this->database->prepare("
        SELECT c.*, u.username as autor 
        FROM chamados c
        JOIN usuarios u ON c.usuario_id = u.id
        ORDER BY c.created_at DESC
        ") ;
        return $queryDB->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ler um chamado em específico

    public function getTicket($id) {
    $query = $this->database->prepare("
        SELECT * FROM chamados WHERE id = ?
    ");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar chamado

    public function UpdateTicket($id,$data) {
        $queryDB = $this->database->prepare("
        UPDATE chamados SET
        titulo = ?,
        descricao = ?
        status = ?,
        updated_at = NOW()
        WHERE id = ?
        ") ;
        return $queryDB->execute([
            $data["titulo"],
            $data["descricao"],
            $data["status"],
            $id
        ]);
    }


}

?>
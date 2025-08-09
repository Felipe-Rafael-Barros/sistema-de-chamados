<?php
session_start();
error_reporting(E_ALL);

// Conexão com o banco
$config = require __DIR__ . '/../config/database.php';


//Conexão PDO
try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4",
        $config['username'],
        $config['password'],
        $config['options']
    );
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Importa o AuthController e Cria o controller passando o $pdo

require __DIR__ ."/../src/Controllers/AuthController.php";
require __DIR__ ."/../src/Controllers/TicketController.php";
$authController = new AuthController($pdo);
$TicketController = new TicketController($pdo);

$Action = $_POST['action'];

//Seletor de ações baseado no campo do form a qual a mensagem chegar

switch ($Action) {
    case 'login':
        $username = $_POST['username']; //Pega a informação passada no login do site
        $password = $_POST['password']; //Pega a informação passada no login do site

        $authController->authentication($username, $password);
        break;
    case 'create':
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $TicketController->createTicket($titulo, $descricao);
        break;
    case 'list':
    
        $tickets = $ticketController->listTickets();
        break;
    case 'update':
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];
        $TicketController->updateTicket($id);
        break;
}
?>
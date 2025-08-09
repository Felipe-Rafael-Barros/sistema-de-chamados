<?php
// Verificação de sessão
session_start();
if (!isset($_SESSION['userLogged'])) {
    header("Location: /sistema-de-chamados/src/Views/auth/login.php");
    exit;
}

require __DIR__ . '/../../Controllers/TicketController.php';

// Conexão PDO
$config = require __DIR__ . '/../../../config/database.php';
$pdo = new PDO(
    "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4",
    $config['username'],
    $config['password'],
    $config['options']
);

$controller = new TicketController($pdo);

// Verifica se o ID foi passado
if (!isset($_GET['id'])) {
    header("Location: /sistema-de-chamados/src/Views/tickets/index.php");
    exit;
}

$ticketId = $_GET['id'];
$ticket = $controller->getTicketById($ticketId);

// Verifica se o ticket existe
if (!$ticket) {
    header("Location: /sistema-de-chamados/src/Views/tickets/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Chamado | Sistema de Chamados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/sistema-de-chamados/public/css/styles.css">
</head>
<body>
    <?php require __DIR__ . '/../layouts/header.php'; ?>

    <main class="container mt-4">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-pencil-square"></i> Editar Chamado #<?= $ticket['id'] ?></h2>
            </div>
            <div class="card-body">
                <form action="/sistema-de-chamados/public/index.php" method="post">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?= $ticket['id'] ?>">
                    
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" 
                               value="<?= htmlspecialchars($ticket['titulo']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" 
                                  rows="5" required><?= htmlspecialchars($ticket['descricao']) ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="aberto" <?= $ticket['status'] === 'aberto' ? 'selected' : '' ?>>Aberto</option>
                            <option value="em_andamento" <?= $ticket['status'] === 'em_andamento' ? 'selected' : '' ?>>Em Andamento</option>
                            <option value="fechado" <?= $ticket['status'] === 'fechado' ? 'selected' : '' ?>>Fechado</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Salvar Alterações
                    </button>
                    <a href="/sistema-de-chamados/src/Views/tickets/index.php" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </main>

    <?php require __DIR__ . '/../layouts/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
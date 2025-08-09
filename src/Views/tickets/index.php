<?php
session_start();
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
$tickets = $controller->listTickets();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados | Sistema de Chamados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/sistema-de-chamados/public/css/styles.css">
</head>
<body>
    <?php require __DIR__ . '/../layouts/header.php'; ?>

    <main class="container mt-4" style="top: 100;">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-ticket-detailed"></i> Meus Chamados</h1>
            <a href="/sistema-de-chamados/src/Views/tickets/create.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo Chamado
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tickets)): ?>
                        <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td><?= $ticket['id'] ?></td>
                            <td><?= htmlspecialchars($ticket['titulo']) ?></td>
                            <td><?= htmlspecialchars($ticket['descricao']) ?></td>
                            <td>
                                <span class="badge rounded-pill bg-<?= 
                                    $ticket['status'] === 'aberto' ? 'success' : 
                                    ($ticket['status'] === 'em_andamento' ? 'warning' : 'secondary') 
                                ?>">
                                    <?= ucfirst(str_replace('_', ' ', $ticket['status'])) ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($ticket['created_at'])) ?></td>
                            <td>
                                <a href="/sistema-de-chamados/src/Views/tickets/edit.php?id=<?= $ticket['id'] ?>" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-inbox"></i> Nenhum chamado cadastrado
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
        <?php require __DIR__ . '/../layouts/footer.php'; ?>
    </footer>
</body>
</html>
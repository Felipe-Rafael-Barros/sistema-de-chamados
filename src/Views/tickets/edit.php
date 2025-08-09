<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($ticket) ? 'Editar Chamado #'.$ticket['id'] : 'Chamado Não Encontrado'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/sistema-de-chamados/public/css/styles.css">
</head>
<body>
    <?php require __DIR__ . '/../layouts/header.php'; ?>

    <main class="container mt-4">
        <?php if (!isset($ticket)): ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill"></i> Chamado não encontrado ou não especificado.
            </div>
            <a href="/sistema-de-chamados/src/Views/tickets/index.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar para lista
            </a>
        <?php else: ?>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-header bg-warning text-dark">
                            <h2 class="h4 mb-0"><i class="bi bi-pencil-square"></i> Editar Chamado #<?php echo $ticket['id']; ?></h2>
                        </div>
                        
                        <div class="card-body">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                            <?php endif; ?>
                            
                            <form method="POST" action="/tickets/<?php echo $ticket['id']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Título *</label>
                                    <input type="text" class="form-control" name="titulo" 
                                           value="<?php echo isset($ticket['titulo']) ? htmlspecialchars($ticket['titulo']) : ''; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Descrição *</label>
                                    <textarea class="form-control" name="descricao" rows="5" required><?php 
                                        echo isset($ticket['descricao']) ? htmlspecialchars($ticket['descricao']) : ''; 
                                    ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Status *</label>
                                    <select class="form-select" name="status" required>
                                        <option value="aberto" <?php echo (isset($ticket['status']) && $ticket['status'] === 'aberto') ? 'selected' : ''; ?>>Aberto</option>
                                        <option value="em_andamento" <?php echo (isset($ticket['status']) && $ticket['status'] === 'em_andamento') ? 'selected' : ''; ?>>Em Andamento</option>
                                        <option value="resolvido" <?php echo (isset($ticket['status']) && $ticket['status'] === 'resolvido') ? 'selected' : ''; ?>>Resolvido</option>
                                    </select>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <a href="/sistema-de-chamados/src/Views/tickets/index.php" class="btn btn-secondaryclass="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Voltar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i> Salvar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
        <?php require __DIR__ . '/../layouts/footer.php'; ?>
    </footer>
    
</body>
</html>
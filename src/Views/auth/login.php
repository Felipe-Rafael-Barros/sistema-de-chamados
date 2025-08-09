<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Chamados</title>
    
    <link rel="icon" href="https://verdanatech.com/wp-content/webp-express/webp-images/uploads/2024/05/Frame-1.png.webp">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="/sistema-de-chamados/public/css/styles.css">
</head>

<body class="bg-light">
    <div class="container">
        <?php require __DIR__ . '/../layouts/header.php'; ?>
        
        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h2 class="h5 mb-0"><i class="bi bi-box-arrow-in-right"></i> Login</h2>
                        </div>
                        
                        <div class="card-body">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                            <?php endif; ?>
                            
                            <form method="POST" action="/sistema-de-chamados/public/index.php"> <!--   
                            Envia para o caminho do action -->
                                <div class="mb-3">
                                    <label for="username" class="form-label">Usuário</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <div>
                                    <input type="hidden" name="action" value="login">
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-box-arrow-in-right"></i> Entrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
        <?php require __DIR__ . '/../layouts/footer.php'; ?>
    </footer>
    
</body>
</html>




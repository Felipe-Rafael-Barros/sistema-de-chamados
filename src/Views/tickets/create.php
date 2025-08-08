<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Chamado | Sistema de Chamados</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="/sistema-de-chamados/public/css/styles.css">
</head>

<body>
    <?php require __DIR__ . '/../layouts/header.php'; ?>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0">Criar Novo Chamado</h1>
                    </div>
                    
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" action="/tickets" class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <label for="titulo" class="form-label">Título do Chamado *</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                                <div class="invalid-feedback">
                                    Por favor, insira um título válido.
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="descricao" class="form-label">Descrição Detalhada *</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor, insira uma descrição.
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary px-4" type="submit">
                                    <i class="bi bi-send-fill"></i> Criar Chamado
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Bootstrap JS + Validação -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Validação do formulário
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
    </script>
    
    <?php require __DIR__ . '/../layouts/footer.php'; ?>
</body>
</html>
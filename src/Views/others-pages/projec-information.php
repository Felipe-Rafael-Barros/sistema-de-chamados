<?php
session_start();
if (!isset($_SESSION['userLogged'])) {
    header("Location: /sistema-de-chamados/src/Views/auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre o Projeto | Sistema de Chamados</title>
    <!-- Inclua seus CSS como no layout principal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/sistema-de-chamados/public/css/styles.css">
</head>
<body>
    <?php require __DIR__ . '/../layouts/header.php'; ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h4 mb-0"><i class="bi bi-info-circle"></i> Sobre o Projeto</h1>
                    </div>
                    <div class="card-body">
                        <section class="mb-5">
                            <h2 class="h5 text-primary"><i class="bi bi-lightbulb"></i> Objetivo</h2>
                            <p class="lead">
                                Sistema desenvolvido para gerenciamento de chamados técnicos internos, 
                                permitindo o registro e acompanhamento de solicitações.
                            </p>
                        </section>

                        <section class="mb-5">
                            <h2 class="h5 text-primary"><i class="bi bi-stack"></i> Tecnologias Utilizadas</h2>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="tech-card p-3 border rounded">
                                        <h3 class="h6"><i class="bi bi-filetype-php text-danger"></i> Back-End</h3>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check-circle text-success"></i> PHP </li>
                                            <li><i class="bi bi-check-circle text-success"></i> MySQL</li>
                                            <li><i class="bi bi-check-circle text-success"></i> PDO</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="tech-card p-3 border rounded">
                                        <h3 class="h6"><i class="bi bi-brush text-info"></i> Front-End</h3>
                                        <ul class="list-unstyled">
                                            <li><i class="bi bi-check-circle text-success"></i> Bootstrap</li>
                                            <li><i class="bi bi-check-circle text-success"></i> HTML Personalizado</li>
                                            <li><i class="bi bi-check-circle text-success"></i> CSS Personalizado</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mb-5">
                            <h2 class="h5 text-primary"><i class="bi bi-diagram-3"></i> Arquitetura</h2>
                            <div class="alert alert-light">
                                <pre class="mb-0">
📦 sistema-de-chamados
├── QuerySQL.sql        # Codigo de construção do Banco de dados MySQL
├── 📂 config
│   └──database.php     # Configurações do DataBase MySQL
├── 📂 public          # Acessível via web
│   ├── 📂 css
│   │       └──database.php 
│   ├── 📂 js
│   ├── 📂 images
│   └──index.php 
└── 📂 src
    ├── 📂 Controllers # Lógica de negócio
    │   ├── AuthController.php
    │   └── TicketController.php
    ├── 📂 Models      # Entidades do sistema
    │   ├── Ticket.php
    │   └── User.php
    └── 📂 Views       # Interfaces
        ├── 📂 auth
        │   ├── login.php
        │   └── logout.php
        ├── 📂 layout
        │   ├── footer.php
        │   └── header.php
        ├── 📂 others-pages
        │   └── projec-information.php
        └── 📂 tickets
            ├── create.php
            ├── edit.php
            └── index.php

                                </pre>
                            </div>
                        </section>

                        <section class="mb-4">
                            <h2 class="h5 text-primary"><i class="bi bi-people"></i> Desenvolvedor</h2>
                            <div class="d-flex align-items-center gap-3">
                                <div class="dev-avatar rounded-circle bg-secondary p-3 text-white">
                                    <i class="bi bi-person-fill fs-4"></i>
                                </div>
                                <div>
                                    <h3 class="h6 mb-1">Felipe Rafael Barros da Silva</h3>
                                    <p class="small mb-0">Desenvolvedor Full Stack</p>
                                </div>
                            </div>
                        </section>

                        <div class="text-center mt-4">
                            <a href="/sistema-de-chamados/src/Views/tickets/index.php" 
                               class="btn btn-primary">
                               <i class="bi bi-arrow-left"></i> Voltar ao Sistema
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require __DIR__ . '/../layouts/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
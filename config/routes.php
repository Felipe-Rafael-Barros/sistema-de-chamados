<?php
return [
    // Rotas públicas
    'GET /login' => ['AuthController', 'showLogin'],  // Exibe formulário
    'POST /login' => ['AuthController', 'login'],    // Processa login
    'GET /logout' => ['AuthController', 'logout'],   // Adicionado logout

    // Rotas autenticadas
    'GET /' => ['TicketController', 'index'],
    'GET /tickets' => ['TicketController', 'index'],
    'GET /tickets/create' => ['TicketController', 'create'],
    'POST /tickets' => ['TicketController', 'store'],
    'GET /tickets/{id}/edit' => ['TicketController', 'edit'],  // Rota para edição
    'POST /tickets/{id}' => ['TicketController', 'update'],    // Rota para atualizar
];
?>
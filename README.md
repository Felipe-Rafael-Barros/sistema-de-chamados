
Arquitetura do Projeto: 


SISTEMA-DE-CHAMADOS/
├── config/
│   ├── database.php     # Config do banco (PDO)
│   └── routes.php       # Definição de rotas
├── public/
│   ├── css/             # Bootstrap/Tailwind aqui
│   ├── js/              # Scripts JS
│   └── index.php        # Roteador principal
└── src/
    ├── Controller/
    │   ├── TicketController.php
    │   └── AuthController.php   # Novo!
    ├── Model/
    │   ├── Ticket.php
    │   └── User.php
    └── View/
        ├── auth/
        │   └── login.php
        └── tickets/
            ├── index.php
            ├── create.php
            └── edit.php
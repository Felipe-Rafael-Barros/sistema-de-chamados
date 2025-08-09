
Arquitetura do Projeto: 


SISTEMA-DE-CHAMADOS/
├── config/
│   ├── database.php     # Config do banco (SQL)
│   └── routes.php       # Definição de rotas
│
├── node_modules
│
├── public/
│   ├── css/             # Bootstrap/Tailwind 
│   │   ├── styles.css
│   │   └── bootstrap.min.css
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
        │   ├── index.php
        │   ├── create.php
        │   └── edit.php
        └── layouts/
            ├── footer.php
            └── header.php
            

    
<?php

class TicketController {
    
    private $ticketModel;
    private $userModel;
    public function __construct($database)
    {
        $this->ticketModel = new Ticket($database);
        $this->userModel = new User($database);
        
    }

    private function checkAuthentication() {
        if (!$this->userModel->isLoggedIn()) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        }
        header('Location: /login');
        exit;
    }

    //Listar todos os chamados

    public function index() {
        $this->checkAuthentication();
        $ticket = $this->ticketModel->ReadTickets();
        require __DIR__ . '/../../src/View/tickets/index.php';
    }

    // Mostrar o formulário de criação do sistema

    public function create() {
        $this->checkAuthentication();
        require __DIR__ .'/../../src/View/tickets/create.php';
    }

    // Processar a criação do chamado no sistema

    public function store() {
        $this->checkAuthentication();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'titulo' => filter_input(INPUT_POST,'titulo', FILTER_SANITIZE_STRING),
                'descricao' => filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING)
            ];
            if ($this->ticketModel->CreateTicket($data)) {
                $_SESSION['sucess'] = "Chamado criado com sucesso!";
                header('Location: /tickets');
                exit;
            }
            else {
                $error = "Erro ao criar chamado";
                require __DIR__ . '/../../src/View/tickets/create.php';
            }
        }
    }

    // Exibir o formulário de edição
    public function edit($id) {
        $this->checkAuthentication();

        $ticket = $this->ticketModel->getTicket($id);
        if(!$ticket) {
            header('Location: /tickets');
            exit;
        }
        require __DIR__ . '/../../src/View/tickets/edit.php';
    }

    //Processar as atualizações do chamado 

    public function update($id) {
        $this->checkAuthentication();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = [
                'titulo' => filter_input(INPUT_POST,'titulo', FILTER_SANITIZE_STRING),
                'descricao' => filter_input(INPUT_POST,'descricao', FILTER_SANITIZE_STRING),
                'status' => filter_input(INPUT_POST,'status', FILTER_SANITIZE_STRING)
            ];
            if ($this->ticketModel->UpdateTicket($id,$data)){
                $_SESSION['success'] = 'Chamado atualizado com sucesso!';
                header('Location: /tickets');
                exit;
            }
            else {
                $error = 'Erro ao atualizar chamado';
                $ticket = $this->ticketModel->getTicket($id);
                require __DIR__ . '/../../src/View/tickets/edit.php';
            }
        }

       
        
    }
}

?>

<?php
    //Configuração do data base MySQL

    return [
    'host' => 'localhost',
    'database' => 'sistema_chamados',
    'username' => 'root',
    'password' => '',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];

?>
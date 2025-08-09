
<?php
    //Configuração do data base MySQL

    return [
        'driver'   => 'mysql',
        'host'     => 'localhost',         // Estou usando o DevServer
        'database' => 'sistema_chamados', //Criando o banco de dados sistema chamados no phpMyAdmin
        'username' => 'root',             // Usuário criado padrão do DevServer
        'password' => '',                 //Padrão do DevServer
        'charset'  => 'utf8mb4',          // Melhor padrão encontrado p/ caracteres especiais
        'port'     => 3306,             // Padrão de porta p/ o MySQL no DevServer
        'options'  => [
            //PHP Data Objects
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Lança exceções em erros
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna arrays associativos
            PDO::ATTR_EMULATE_PREPARES => false,              //Usa prepared statements naivos do MySQL
        ]

        ];


?>